<?php if(!defined('s7V9pz')) {die();}?>URL = window.URL || window.webkitURL;

var gumStream;
var recorder;
var input;
var encodingType;
var encodeAfterRecord = true;
var AudioContext = window.AudioContext || window.webkitAudioContext;
var audioContext;
var recordButton = document.getElementById("recordButton");
var stopButton = document.getElementById("stopButton");
$('.swr-grupo .panel > .textbox > .box > .icon > .gr-moreico > ul > li.grrecord').on('click', function (e) {
    startRecording();
});

function startRecording() {
    var constraints = {
        audio: true, video: false
    };
    navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
        audioContext = new AudioContext();
        gumStream = stream;
        input = audioContext.createMediaStreamSource(stream);
        encodingType = 'mp3';

        recorder = new WebAudioRecorder(input, {
            workerDir: "riches/kit/audiorecorderjs/lib/",
            encoding: encodingType,
            numChannels: 2,
            onEncoderLoading: function(recorder, encoding) {},
            onEncoderLoaded: function(recorder, encoding) {}
        });

        recorder.onComplete = function(recorder, blob) {
            createDownloadLink(blob, recorder.encoding);
        };

        recorder.setOptions({
            timeLimit: 600,
            encodeAfterRecord: encodeAfterRecord,
            ogg: {
                quality: 0.5
            },
            mp3: {
                bitRate: 160
            }
        });
        recorder.startRecording();

    }).catch(function(err) {
        alert("Permission to use microphone denied. Kindly check Browser Settings");
        $('.gr-mic').removeClass('recrdng').fadeIn();
        $('.swr-grupo .panel > .textbox > .box > .icon > .gr-moreico').removeClass('recording');

    });
    $('.swr-grupo .panel > .textbox > .box > .icon > .gr-moreico').addClass('recording');
}

function stopRecording() {
    gumStream.getAudioTracks()[0].stop();
    $('.swr-grupo .panel > .textbox > .box > .icon > .gr-moreico').removeClass('recording');
    recorder.finishRecording();
}

function createDownloadLink(blob, encoding) {
    var url = URL.createObjectURL(blob);
    var filename = 'audiomsg'+ '.'+encoding;
    var data = new FormData();
    data.append("act", 1);
    data.append("do", "group");
    data.append("type", "sendaudio");
    data.append("id", "sendaudio");
    data.append("audio_data", blob, filename);
    data.append("id", $('.swr-grupo .panel').attr('no'));
    data.append("ldt", $('.swr-grupo .panel').attr('ldt'));
    data.append("from", grlastid());
    $(".swr-grupo .panel > .room > .msgs").animate({
        scrollTop: $(".swr-grupo .panel > .room > .msgs").prop("scrollHeight")
    }, 500);
    var senid = rand(8);
    var moset = $(".dumb .gdefaults").find(".sndmsgalgn").text();
    var senmsg = $(".gphrases > .sending").text();
    var msg = '<li class="you animate__animated animate__fadeIn '+senid+' '+moset+'" no="0"> <div><span class="msg"><i>';
    msg = msg+'<span class="block" type="files"><span><span class="ptxt">'+(escapeHtml(senmsg))+'</span><span class="animate__animated animate__fadeInUp animate__infinite">';
    msg = msg+'<i class="gi-upload"></i></span></span></span></i>';
    msg = msg+'</span></div></li>';
    $('.swr-grupo .panel > .room > .msgs').append(msg);
    scrollmsgs();
    $.ajax({
        url: '',
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        async: true,
        data: data,
        type: 'post',
    }).done(function(data) {
        data = $.parseJSON(data);
        $("."+senid).remove();
        if ($(".swr-grupo .panel").attr("no") == data[0].gid) {
            loadmsg(data);
        }
    }).fail(function() {
        $(".swr-grupo .panel > .room > .msgs > li."+senid+" > div > .msg > i > span.block > span > span.ptxt").text($(".gphrases > .failed").text());
        $(".swr-grupo .panel > .room > .msgs > li."+senid+" > div > .msg > i > span.block > span > span > i").removeClass("gi-upload");
        $(".swr-grupo .panel > .room > .msgs > li."+senid+" > div > .msg > i > span.block > span > span").removeClass("animate__animated");
        $(".swr-grupo .panel > .room > .msgs > li."+senid+" > div > .msg > i > span.block > span > span > i").addClass("gi-minus-circled-1");
        setTimeout(function() {
            $("."+senid).remove();
        }, 2000);
    })
}