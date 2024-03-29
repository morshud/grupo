<?php if(!defined('s7V9pz')) {die();}?>body,html
{
height: 100%;
margin: 0px;
width: 100%;
}

body
{
background: url(gem/ore/grupo/global/bg.jpg);
background-size: cover;
background-position: center;
overflow-x: hidden;
overflow-y: auto;
}

.vwp
{
cursor: pointer;
}

.gruploader
{
background: linear-gradient(to right,#E91E63,#9C27B0);
border-radius: 100%;
color: white;
margin-left: auto;
font-size: 11px;
text-align: center;
display: none;
}

.gruploader > i
{
padding: 6px;
display: block;
}

.gr-preloader
{
position: fixed;
bottom: 0px;
z-index: 999;
left: 0px;
width: 100%;
height: 100%;
text-align: center;
display: block;
background: #d5d9d8;
background-size: cover;
background-position: center;
}

.gr-preloader > div
{
display: -webkit-box;
display: -webkit-flex;
display: -ms-flexbox;
display: flex;
-webkit-box-align: center;
-webkit-align-items: center;
-ms-flex-align: center;
align-items: center;
min-height: 100%;
-webkit-box-pack: center;
-webkit-justify-content: center;
-ms-flex-pack: center;
justify-content: center;
}

.gr-preloader > div > span
{
background-image: url(gem/ore/grupo/global/load.gif);
background-repeat: no-repeat;
background-position: center;
background-size: 80px;
display: block;
width: 80px;
height: 80px;
}

.swr-grupo
{
height: 100%;
display: none;
position: relative;
}

.swr-grupo .noclick
{
cursor: no-drop;
}

.swr-grupo .fh
{
height: 100%;
}

.swr-grupo .subnav
{
cursor: pointer;
}

.swr-grupo > .window
{
padding: 1% 2%;
}

.swr-grupo .aside
{
background: white;
padding: 0px;
z-index: 1;
height: 100%;
overflow: hidden;
position: relative;
transition: 0.5s;
}

.swr-grupo .fold.aside
{
-ms-flex: 0 0 0%;
flex: 0 0 0%;
max-width: 0%;
overflow: hidden;
height: 0px;
}

.swr-grupo .aside > .head
{
padding: 0px 15px;
text-align: center;
font-weight: 600;
height: 60px;
position: absolute;
width: 100%;
z-index: 7;
display: flex;
align-items: center;
justify-content: center;
}

.swr-grupo .aside > .head > .menu
{
order: 1;
display: inline-block;
align-items: center;
}

.swr-grupo .aside > .head > .logo
{
display: inline-flex;
font-size: 16px;
order: 2;
cursor: pointer;
overflow: hidden;
height: 100%;
align-items: center;
padding: 10px 0px;
max-width: 145px;
margin-left: auto;
}

.swr-grupo .aside > .head > .logo > img
{
max-height: 50px;
max-width: 140px;
}

.swr-grupo .aside > .head > .icons
{
order: 3;
margin-left: auto;
display: inline-flex;
align-items: center;
padding-left: 10px;
}

.swr-grupo .aside > .head > .icons >.mprf
{
width: 38px;
}

.swr-grupo .aside > .head > .icons >.mprf > img
{
width: 100%;
border-radius: 100%;
}

.swr-grupo .aside > .head > .icons > i
{
}

.swr-grupo i.malert > i
{
font-style: normal!important;
background: red!important;
color: white!important;
border-radius: 100%!important;
padding: 4px!important;
font-size: 10px!important;
position: absolute!important;
width: 20px!important;
text-align: center!important;
height: 20px!important;
margin-left: -31px!important;
}

.swr-grupo .aside > .head i
{
border-radius: 100%;
font-size: 25px;
color: #a9a9a9;
cursor: pointer;
transition: 0.4s;
font-weight: 300;
display: inline-block;
margin-right: 10px;
}

.swr-grupo .aside > .head i.gi-bell-1
{
margin-right: 0px;
}

.swr-grupo .aside > .search
{
padding: 7px 15px;
text-align: left;
background: #f7f9fb;
border: 1px solid #dfe7ef;
border-right: 0px;
border-left: 0px;
margin-top: 60px;
position: absolute;
width: 100%;
height: 60px;
z-index: 6;
}

.swr-grupo .aside > .search > i
{
position: absolute;
padding: 13px 0px;
padding-bottom: 0px;
padding-left: 28px;
color: #00000038;
left: 0px;
}

.swr-grupo .aside > .search > input
{
outline: 0px;
width: 100%;
background: #ffffff;
border-radius: 26px;
padding: 10px 13px;
color: #676767;
padding-left: 35px;
font-size: 14px;
border: 1px solid #dfe7ef;
}

.swr-grupo .aside > .tabs
{
padding: 0px 12px;
border-bottom: 1px solid #dfe7ef;
margin-bottom: 10px;
position: absolute;
margin-top: 120px;
height: 46px;
width: 100%;
z-index: 5;
}

.swr-grupo .aside > .tabs > ul
{
list-style: none;
padding: 0px;
margin: 0px;
display: flex;
overflow: hidden;
align-items: center;
}

.swr-grupo .aside > .tabs > ul > li
{
display: inline-flex;
font-size: 13px;
cursor: pointer;
color: #808080;
padding: 12px 10px;
}

.swr-grupo .aside > .tabs > ul > li > .subtab
{
list-style: none;
display: none;
padding: 0px;
position: absolute;
margin-top: 30px;
background: white;
box-shadow: 0px 0px 2px #989898bf;
margin-bottom: 0px;
margin-left: -12px;
}

.swr-grupo .aside > .tabs > ul > li > .subtab > li
{
padding: 5px 10px;
border-bottom: 1px solid #dfe7ef;
}

.swr-grupo .aside > .tabs > ul > li > .subtab > li:last-child
{
border: 0px;
}

.swr-grupo .aside > .tabs > ul > li > .subtab > li:hover,.swr-grupo .aside > .tabs > ul > li > .subtab > li.active
{
background: #f7f9fb;
}

.swr-grupo .aside > .tabs > ul > li.xtra
{
padding: 0px;
}

.swr-grupo .aside > .tabs > ul > li.xtra > span
{
display: block;
padding: 12px 10px;
}

.swr-grupo .aside > .tabs > ul > li.active
{
font-weight: 600;
color: black;
border-bottom: 3px solid #E91E63;
}

.swr-grupo .lside > .tabs > ul > li.grfavorites.active
{
color: #E91E63;
font-weight: 500;
border-color: transparent;
}

.swr-grupo .lside > .tabs > ul > li.grfavorites > span
{
font-size: 18px;
display: block;
}

.swr-grupo .aside > .tabs > ul > li > i > i
{
font-weight: 600;
font-style: normal;
margin-left: 3px;
font-size: 11px;
background: linear-gradient(to right,#F44336,#E91E63);
color: white;
border-radius: 3px;
padding: 2px 4px;
}

.swr-grupo .aside > .content .profile
{
display: none;
height: 100%;
z-index: 50;
position: relative;
}

.swr-grupo .aside > .content .profile > .top
{
padding: 15px;
background: #E91E63;
background: linear-gradient(to right,#E91E63,#9C27B0);
color: white;
padding-bottom: 35px;
height: 190px;
position: absolute;
width: 100%;
}

.swr-grupo .aside > .content .profile > .top > span.edit > span
{
float: left;
cursor: pointer;
}

.swr-grupo .aside > .content .profile > .top > span.edit > span > i
{
font-size: 21px;
opacity: 0.6;
}

.swr-grupo .aside > .content .profile > .top > span.coverpic
{
position: absolute;
width: 100%;
height: 100%;
overflow: HIDDEN;
left: 0px;
margin-top: -15px;
z-index: 1;
}

.swr-grupo .aside > .content .profile > .top > span.coverpic > span
{
content: "";
width: 100%;
height: 100%;
position: absolute;
background: #000000a1;
top: 0px;
display: block;
left: 0px;
}

.swr-grupo .aside > .content .profile > .top > span.coverpic > img
{
object-fit: cover;
width: 100%;
height: 100%;
}

.swr-grupo .aside > .content .profile > .middle
{
text-align: center;
margin-bottom: 0px;
border-bottom: 1px solid;
height: 85px;
border-color: #DFE7EF;
margin-top: 190px;
position: absolute;
width: 100%;
background: white;
z-index: 7;
}

.swr-grupo .aside > .content .profile > .bottom
{
background: #F7F9FB;
padding-top: 275px;
padding-bottom: 15px;
min-height: 180px;
border-bottom: 1px solid;
border-color: #DFE7EF;
height: 100%;
}

.swr-grupo .aside > .content .profile > .bottom > div
{
height: 100%;
}

.swr-grupo .aside > .content .profile > .bottom > div > div
{
display: none;
height: 100%;
}

.swr-grupo .aside > .content .profile > .bottom > div > div > div
{
display: -webkit-box;
display: -webkit-flex;
display: -ms-flexbox;
display: flex;
-webkit-box-align: center;
-webkit-align-items: center;
-ms-flex-align: center;
align-items: center;
min-height: 100%;
-webkit-box-pack: center;
-webkit-justify-content: center;
-ms-flex-pack: center;
justify-content: center;
}

.swr-grupo .aside > .content .profile > .bottom > div > div > div > span
{
font-size: 57px;
text-align: center;
font-weight: 700;
line-height: 39px;
color: #c3c7ca;
display: block;
}

.swr-grupo .aside > .content .profile > .bottom > div > div > div > span > span
{
display: block;
font-size: 13px;
font-weight: 500;
}

.swr-grupo .aside > .content .profile > .bottom > div > ul
{
list-style: none;
padding: 2px 15px;
height: 100%;
overflow: scroll;
overflow-x: hidden;
}

.swr-grupo .aside > .content .profile > .bottom > div > ul > li
{
padding: 5px 0px;
}

.swr-grupo .aside > .content .profile > .bottom > div > ul > li > b
{
display: block;
font-size: 14px;
}

.swr-grupo .aside > .content .profile > .bottom > div > ul > li > span
{
font-size: 14px;
display: block;
}

.swr-grupo .aside > .content .profile > .bottom > div > ul > li > span > a
{
color: inherit;
text-decoration: none;
}

.swr-grupo .aside > .content .profile > .top > span
{
display: block;
text-align: center;
position: relative;
z-index: 7;
}

.swr-grupo .aside > .content .profile > .top > span.edit
{
text-align: right;
min-height: 27px;
position: relative;
z-index: 7;
}

.swr-grupo .aside > .content .profile > .top > span.edit > i
{
font-style: normal;
padding: 3px 7px;
font-size: 13px;
color: #FFC107;
border: 1px solid;
border-radius: 5px;
cursor: pointer;
display: inline-block;
}

.swr-grupo .aside > .content .profile > .top > span.dp
{
margin-bottom: 12px;
margin-top: 4px;
position: relative;
z-index: 9;
}

.swr-grupo .aside > .content .profile > .top > span.name
{
font-size: 15px;
font-weight: 600;
line-height: 14px;
}

.swr-grupo .aside > .content .profile > .top > span.role
{
font-size: 14px;
font-weight: 500;
color: #ffffffad;
cursor: pointer;
}

.swr-grupo .aside > .content .profile > .top > span.dp > img
{
border-radius: 100%;
width: 70px;
height: 70px;
transition: 0.5s;
border: 3px solid #fff;
cursor: pointer;
}

.swr-grupo .aside > .content .profile > .top > span.dp > img:hover
{
transform: scale(2);
}

.swr-grupo .aside > .content .profile > .middle > span.stats
{
display: flex;
overflow: hidden;
height: 50px;
text-align: center;
justify-content: center;
}

.swr-grupo .aside > .content .profile > .middle > span.pm
{
display: inline-block;
background: white;
padding: 4px 15px;
border-radius: 5px;
box-shadow: 0px 1px 2px #33333354;
color: #E91E63;
font-size: 14px;
margin-bottom: 0px;
cursor: pointer;
top: -15px;
position: relative;
}

.swr-grupo .aside > .content .profile > .middle > span.stats > span
{
display: inline-block;
padding: 0px 8px;
font-weight: 700;
overflow: HIDDEN;
height: 40px;
font-size: 19px;
color: #727273;
line-height: 19px;
border-right: 1px solid #33333338;
}

.swr-grupo .aside > .content .profile > .middle > span.stats > span:last-child
{
border-right: 0px solid #33333338;
}

.swr-grupo .aside > .content .profile > .middle > span.stats > span > i
{
display: block;
font-style: normal;
font-weight: 600;
font-size: 12px;
text-transform: uppercase;
color: #9a9a9a;
}

.swr-grupo .aside > .content > .addmore
{
position: absolute;
bottom: 15px;
right: 15px;
z-index: 10;
display: none;
}

.swr-grupo .aside > .content > .addmore.shw
{
display: inline-block;
}

.swr-grupo .aside > .content > .addmore > span
{
background: linear-gradient(to right,#E91E63,#9C27B0);
border-radius: 100%;
color: white;
cursor: pointer;
padding-top: 2px;
width: 30px;
text-align: center;
height: 30px;
display: inline-block;
}

.swr-grupo .aside > .content > .addmore > span > i
{
font-size: 16px;
}

.swr-grupo .aside > .content
{
height: 100%;
padding-top: 166px;
}

.swr-grupo.rtl .grgif > .wrap > .search > input
{
direction: rtl;
}

.swr-grupo.rtl .panel > .room > .msgs > li
{
direction: rtl;
}

.swr-grupo.rtl .panel > .room > .msgs > li > div i.usrname
{
text-align: right;
}

.swr-grupo.rtl .panel > .room > .msgs > li > div > .msg > i
{
direction: rtl;
text-align: right;
}

.rtl .swr-menu > ul
{
text-align: right;
}

.swr-grupo.rtl .aside > .tabs
{
direction: rtl;
}

.swr-grupo.rtl .aside > .search
{
direction: rtl;
text-align: right;
}

.swr-grupo.rtl .aside > .search > i
{
left: auto;
right: 30px;
}

.swr-grupo.rtl .aside > .search > input
{
padding-left: 13px;
padding-right: 35px;
}

.swr-grupo.rtl .aside > .content > .list
{
direction: rtl;
}

.swr-grupo.rtl .rside > .top > .left > span > span
{
text-align: right;
}

.swr-grupo.rtl .aside > .content > .list > li > div > .left
{
margin-left: 10px;
margin-right: 0px;
}

.swr-grupo.rtl .rside > .top
{
direction: rtl;
}

.swr-grupo.rtl .aside > .content .profile > .bottom > div > ul
{
direction: rtl;
text-align: right;
}

.swr-grupo.rtl .aside > .content > .list > li > div > .center > i
{
margin-left: 0px;
margin-right: 4px;
}

.rtl .rside .swr-menu.r-end
{
left: 0px;
right: auto;
margin-right: 0px;
}

.rtl .emojionearea-editor
{
text-align: right;
direction: rtl;
}

.emojionearea .emojionearea-picker .emojionearea-filters
{
background: #e6e6e6;
}

.grupo-pop.rtl
{
direction: rtl;
}

.swr-grupo.rtl .lside
{
order: 3;
}

.swr-grupo.rtl .rside
{
order: 1;
}

.swr-grupo.rtl .panel
{
order: 2;
}

.grupo-pop.rtl > div > form > .search > i
{
left: auto;
padding-left: 17px;
padding-right: 30px;
right: 0px;
}

.grupo-pop.rtl > div > form > .search > input
{
padding: 10px 13px;
padding-right: 48px;
}

.grupo-pop.rtl > div > form > div > div > label
{
text-align: right;
}

.grupo-pop.rtl > div > form > .fields > div > span > span
{
text-align: right;
}

.swr-grupo.rtl .rside > .top > .right
{
float: left;
position: absolute;
left: 0px;
right: auto;
margin-right: 0px;
margin-left: 15px;
}

.swr-grupo.rtl .rside > .top > .left > span > img
{
margin-right: 0px;
margin-left: 9px;
}

.swr-grupo.rtl .aside > .content > .list > li > div > .center
{
text-align: right;
}

.swr-grupo.rtl .aside > .content > .list > li > div > .right
{
margin-right: auto;
margin-left: 0px;
}

.swr-grupo .aside > .content > .list
{
padding: 0px;
list-style: none;
margin: 0px;
overflow-x: hidden;
padding-bottom: 40px;
}

.swr-grupo .aside > .content > .list > li
{
display: block;
margin-bottom: 0px;
width: 100%;
padding: 11px 15px;
cursor: pointer;
border-bottom: 1px solid #fff;
border-top: 1px solid #fff;
transition: 0.5s;
}

.swr-grupo .aside > .content > .list > li.active,.swr-grupo .aside > .content > .list > li:hover
{
background: #f7f9fb;
border-bottom: 1px solid #dfe7ef;
border-top: 1px solid #dfe7ef;
font-weight: 600;
}

.swr-grupo .aside > .content > .list > li > div
{
display: flex;
align-items: center;
justify-content: center;
}

.swr-grupo .aside > .content > .list > li > div > .left
{
text-align: center;
padding: 0px;
width: 40px;
margin-right: 10px;
display: inline-block;
background: url('gem/ore/grupo/global/load.gif');
height: 40px;
background-size: cover;
border-radius: 100%;
}

.swr-grupo .aside > .content > .list > li > div > .left > img
{
width: 40px;
height: 40px;
border-radius: 5px;
}

.swr-grupo .aside > .content > .list > li > div > .center
{
display: block;
font-size: 13px;
color: #696767;
font-weight: 600;
}

.swr-grupo .aside > .content > .list > li > div > .center > b
{
font-weight: 600;
height: 17px;
overflow: hidden;
display: inline-block;
word-break: break-all;
}

.swr-grupo .aside > .content > .list > li > div > .center > b > span
{
display: inline-block;
}

.swr-grupo .aside > .content > .list > li > div > .center > i
{
margin-left: 4px;
}

.swr-grupo .aside > .content > .list > li > div > .center > i[class^="gi-"]
{
font-size: 12px;
position: relative;
top: -3px;
opacity: 0.5;
}

.swr-grupo .aside > .content > .list > li > div > .center > u
{
text-decoration: none;
}

.swr-grupo .aside > .content > .list > li > div > .center > u.cnts > u
{
font-style: normal;
margin-left: 5px;
font-size: 11px;
border: 1px solid;
color: #E91E63;
font-weight: 600;
text-decoration: none;
border-radius: 4px;
padding: 2px 4px;
white-space: pre;
}

.swr-grupo .aside > .content > .list > li > div > .center > span
{
font-size: 12px;
color: #828588;
word-break: break-all;
display: block;
font-weight: 500;
overflow: hidden;
}

.swr-grupo .aside > .content > .list > li > div > .right
{
display: inline-block;
color: #a4a5a7;
font-size: 11px;
text-align: right;
right: 0px;
margin-left: auto;
}

.swr-grupo .aside > .content > .pages
{
position: absolute;
bottom: 0px;
font-size: 14px;
width: 100%;
left: 0px;
height: 58px;
padding: 15px;
text-align: center;
background: #F7F9FB;
border-top: 1px solid #dfe7ef;
}

.swr-grupo .aside > .content > .pages > span.prev
{
background: #607D8B;
padding: 3px 15px;
display: inline-block;
color: white;
border-radius: 4px;
}

.swr-grupo .aside > .content > .pages > span.prev:before
{
content: "\e75d";
font-family: "grupoico";
}

.swr-grupo .aside > .content > .pages > span.current
{
width: 50px;
display: inline-block;
text-align: center;
border: 1px solid #607D8B;
color: #607D8B;
margin-left: 5px;
}

.swr-grupo .aside > .content > .pages >span.total:before
{
content: "/";
margin-right: 5px;
}

.swr-grupo .aside > .content > .pages >span.total
{
margin-left: 3px;
color: #607D8B;
}

.swr-grupo .aside > .content > .pages > span.next
{
background: #607D8B;
padding: 3px 15px;
display: inline-block;
color: white;
border-radius: 4px;
margin-left: 5px;
}

.swr-grupo .aside > .content > .pages > span.next:before
{
content: "\e75e";
font-family: "grupoico";
}

.swr-grupo .aside > .content > .pages > span.current > input
{
width: 100%;
border: 0px;
color: #607D8B;
background: transparent;
text-align: center;
outline: none;
}

.swr-grupo .panel
{
background: #f8f9fa;
padding: 0px;
padding-top: 0px;
height: 100%;
overflow: hidden;
z-index: 2;
border-left: 1px solid #dfe7ef;
position: relative;
transition: 0.5s;
}

.swr-grupo .panel:before
{
content: "";
opacity: 0.07;
position: absolute;
width: 100%;
height: 100%;
}

.swr-grupo .full.panel
{
-ms-flex: 0 0 100%;
flex: 0 0 100%;
max-width: 100%;
border-radius: 5px;
}

.swr-grupo .panel > .searchbar
{
padding: 0px;
margin-top: 60px;
position: absolute;
width: 100%;
display: none;
background: white;
z-index: 8;
border-bottom: 1px solid #dfe7ef;
}

.swr-grupo .panel > .searchbar > span
{
display: block;
position: relative;
color: #6b6b6b;
}

.swr-grupo .panel > .searchbar > span > i
{
position: absolute;
padding: 23px 17px;
padding-bottom: 0px;
}

.swr-grupo .panel > .searchbar > span > input
{
width: 100%;
background: transparent;
border: 0px;
padding: 15px 0px;
outline: none;
font-size: 14px;
color: #6b6b6b;
padding-left: 35px;
height: 60px;
}

.swr-grupo .panel > .room
{
padding: 15px 0px;
padding-top: 60px;
padding-bottom: 80px;
transition: 0.2s;
}

.swr-grupo .panel > .room > .groupreload
{
position: absolute;
width: 100%;
text-align: center;
display: none;
z-index: 7;
margin-top: 10px;
}

.swr-grupo .panel > .room > .groupreload > i
{
background: linear-gradient(to right,#000,#000);
color: white;
border-radius: 25px;
font-style: normal;
padding: 3px 12px;
font-size: 13px;
cursor: pointer;
}

.swr-grupo .panel > .room > .groupreload > i > i
{
margin-right: 4px;
}

.grloader
{
position: absolute;
height: 100%;
top: 0px;
display: none;
width: 100%;
z-index: 2;
}

.grloader > div
{
text-align: center;
display: flex;
align-items: center;
height: 100%;
}

.grloader > div > div
{
display: inline-block;
width: 100%;
height: 100%;
text-align: center;
}

.grloader.error > div > div > .spin
{
background: url(gem/ore/grupo/global/error.png) no-repeat;
background-position: center;
background-size: 100px;
}

.grloader > div > div > .spin
{
background: url(gem/ore/grupo/global/load.gif) no-repeat;
height: 100%;
background-position: center;
background-size: 60px;
display: inline-block;
width: 100%;
}

.grloader.msgloader
{
padding-bottom: 41px;
}

.grloader.msgloader.scrolload
{
height: 40px;
margin-top: 60px;
}

.grloader.msgloader.scrolload > div
{
height: 40px;
}

.grloader.msgloader.scrolload > div > div > .spin
{
background: url(gem/ore/grupo/global/load.gif) no-repeat;
height: 100%;
background-position: center;
background-size: 50px;
display: inline-block;
width: 100%;
}

.grloader.listloader
{
padding-top: 60px;
}

.mentimg
{
width: 20px;
height: 20px;
margin-right: 3px;
border-radius: 100%;
}

.dragfile
{
position: absolute;
height: 100%;
top: 0px;
display: none;
width: 100%;
z-index: 5;
background: #ffffff6e;
}

.dragfile > div
{
text-align: center;
display: flex;
align-items: center;
height: 100%;
}

.dragfile > div > div
{
display: inline-block;
width: 100%;
text-align: center;
}

.dragfile > div > div > .icon
{
background: url(gem/ore/grupo/icons/drag.svg) no-repeat;
height: 60px;
background-size: contain;
display: inline-block;
width: 60px;
opacity: 0.4;
}

.dragfile.dragattach
{
padding-bottom: 41px;
}

.dragfile.dragupload
{
height: 100%;
background: #ffffff87;
padding-top: 90px;
}

.swr-grupo .panel > .room > .msgs
{
list-style: none;
margin: 0px;
overflow: hidden;
padding: 0px;
overflow-y: scroll;
overflow-x: hidden;
padding-top: 4px;
padding-bottom: 20px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > i.rply > i > a,.swr-grupo .panel > .room > .msgs > li > div > .msg > i > a
{
color: inherit;
text-decoration: none;
opacity: 1;
transition: 0.2s;
}

.swr-grupo .panel > .room > .msgs > li.like,.swr-grupo .panel > .room > .msgs > li.logs
{
display: none;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i a
{
text-decoration: none;
color: inherit;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > i.rply > i > a > i, .swr-grupo .panel > .room > .msgs > li > div > .msg > i > a > i
{
margin-right: 2px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > i.moretext
{
font-style: normal;
display: none;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > i.shortmsg
{
font-style: normal;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > i.readmore
{
font-style: normal;
margin-left: 4px;
display: inline;
border-radius: 18px;
border: 1px solid;
padding: 0px 4px;
font-size: 12px;
cursor: pointer;
white-space: pre;
}

.swr-grupo .panel > .room > .msgs > li.like
{
padding: 0px;
width: 0px;
height: 0px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > .linkprv
{
display: block;
background: #00000040;
padding: 7px;
border-radius: 5px;
margin-top: 2px;
cursor: pointer;
font-size: 13px;
margin-bottom: 5px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > .linkprv i
{
display: block;
font-style: normal;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > .linkprv i.title
{
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > .linkprv i.desc
{
opacity: 0.8;
font-size: 13px;
height: 35px;
overflow: hidden;
}

.swr-grupo .panel > .textbox > .lnkprvw
{
position: relative;
z-index: 5;
bottom: 0px;
background: white;
border-radius: 7px;
display: block;
padding: 10px 10px;
}

.swr-grupo .panel > .textbox > .lnkprvw > span
{
display: block;
background: #f7f9fb;
padding: 9px;
border-radius: 5px;
}

.swr-grupo .panel > .textbox > .lnkprvw > span > i
{
font-style: normal;
display: block;
}

.swr-grupo .panel > .textbox > .lnkprvw > span > i.title
{
font-size: 13px;
color: #7a7b7b;
}

.swr-grupo .panel > .textbox > .lnkprvw > span > i.desc
{
font-size: 13px;
opacity: 0.6;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > .linkprv > span
{
display: block;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > .linkprv > img
{
float: left;
height: 55px;
max-width: 55px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > .lcount
{
font-style: normal;
position: absolute;
top: -2px;
right: 0px;
margin-right: -12px;
margin-top: -5px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > .lcount > i
{
font-style: normal;
border-radius: 20px;
padding: 0px 3px;
font-size: 10px;
background: #FFEB3B;
font-weight: 600;
color: black;
}

.swr-grupo .panel > .room > .msgs > li.right > div > .msg > .lcount
{
left: 0px;
right: auto;
margin-right: 0px;
margin-left: -12px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > .time > i.ti-alarm-clock
{
margin-right: 2px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > .time > i.autodel
{
font-style: normal;
font-weight: 600;
opacity: 0.8;
}

.swr-grupo .panel > .room > .msgs > li
{
padding: 3px 15px;
display: block;
position: relative;
}

.swr-grupo .panel > .room > .msgs > li > div
{
display: inline-block;
position: relative;
padding-right: 25%;
padding-left: 0%;
}

.swr-grupo .panel > .room > .msgs > li.right > div
{
padding-left: 25%;
padding-right: 0%;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > .urlpreview
{
background: #fff;
text-align: center;
width: 190px;
padding: 0px;
font-size: 15px;
overflow: hidden;
border-radius: 10px;
color: #4c4c4c;
cursor: pointer;
box-shadow: 0px 1px 2px #d6d6d6;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > .urlpreview.embedvideo > .limg:after
{
content: "";
height: 110px;
width: 190px;
background: url(gem/ore/grupo/global/playbtn.png)no-repeat;
background-position: center;
background-size: 40px;
position: absolute;
top: 0px;
left: 0px;
}

.swr-grupo .panel > .room > .msgs > li.you > div > .msg > .urlpreview
{
background: linear-gradient(to right,#E91E63,#9C27B0);
color: #ffffff;
box-shadow: 0px 0px 0px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > .urlpreview > .limg
{
display: block;
text-align: center;
height: 110px;
background: #e0e0e0;
background: #333 url(gem/ore/grupo/global/load.gif)no-repeat;
background-position: center;
background-size: 50px;
}

.swr-grupo .lrmbg.errorld
{
background: #e0e0e0 url(gem/ore/grupo/global/error.png)no-repeat!important;
background-position: center!important;
background-size: 60px!important;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > .urlpreview > .limg > img
{
width: 100%;
height: 100%;
object-fit: cover;
object-position: center;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > .urlpreview > .lmeta
{
display: block;
padding: 6px 11px;
text-align: left;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > .urlpreview > .lmeta > b
{
display: block;
font-size: 13px;
font-weight: 500;
max-height: 30px;
overflow: hidden;
line-height: 16px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > .urlpreview > .lmeta > span
{
display: block;
font-size: 12px;
opacity: 0.7;
max-height: 30px;
margin-top: 2px;
overflow: hidden;
line-height: 14.6px;
}

.swr-grupo .panel > .room > .msgs > li > div > .img
{
text-align: center;
padding: 0px;
width: 31px;
margin-right: 15px;
background: url(gem/ore/grupo/global/load.gif);
height: 31px;
background-size: cover;
border-radius: 100%;
float: left;
cursor: pointer;
}

.swr-grupo .panel > .room > .msgs > li > div > .img > img
{
width: 100%;
border-radius: 100%;
margin-right: 0px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg
{
display: flex;
align-items: center;
position: relative;
direction: ltr;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > .codeqr > canvas
{
border: 5px solid #fff;
background: white;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > .codeqr
{
display: block;
width: 110px;
height: 110px;
direction: ltr;
margin-top: 2px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > .codeqr > span
{
display: none;
}

.msg span.opts
{
display: none;
position: relative;
height: 20px;
margin-top: -10px;
padding-top: 4px;
}

i.gr-like
{
background: url(gem/ore/grupo/icons/like.svg)no-repeat;
background-position: center;
background-size: 85%;
transition: 0.5s;
}

i.gr-like.liked
{
transform: rotate(180deg);
}

i.gr-download
{
background: url(gem/ore/grupo/icons/download.svg)no-repeat;
background-position: center;
background-size: 85%;
}

i.gr-reply
{
background: url(gem/ore/grupo/icons/reply.svg)no-repeat;
background-position: center;
background-size: 85%;
}

i.gr-remove
{
background: url(gem/ore/grupo/icons/remove.svg)no-repeat;
background-position: center;
background-size: 85%;
}

.msg span.opts > span
{
position: absolute;
min-width: 120px;
right: -120px;
}

.swr-grupo .panel > .room > .msgs > li.right > div > .msg span.opts > span
{
right: auto;
left: -120px;
}

.msg span.opts > span > i
{
width: 20px;
height: 20px;
display: inline-block;
margin-right: 5px;
margin-left: 5px;
opacity: 0.4;
cursor: pointer;
}

.msg span.opts > span > i:hover
{
opacity: 0.8;
}

i.gr-report
{
background: url(gem/ore/grupo/icons/report.svg)no-repeat;
background-position: center;
background-size: 85%;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i .emojione
{
width: 17px;
padding: 0px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i i.mentnd
{
font-style: normal;
color: #FFEB3B;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i
{
text-align: left;
border-radius: 4px;
display: inline-block;
padding: 3px 5px;
font-size: 13.5px;
font-style: normal;
word-break: break-word;
background-color: #ffffff;
color: #333333;
box-shadow: 0px 1px 2px #d6d6d6;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > .time
{
display: block;
display: none;
margin-left: 0px;
margin-top: 4px;
text-align: left;
border-radius: 4px;
max-width: 100%;
color: #676767;
font-size: 11px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > .time > i.likes
{
font-style: normal;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > .time > i.likes > b
{
font-style: normal;
font-weight: 500;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > .time > i.likes > i
{
font-family: "grupoico";
color: #a2a2a2;
font-style: normal;
padding: 0px 3px;
font-size: 11px;
cursor: pointer;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > .time > i.likes > i:before
{
content: '\e927';
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > .time > i.likes > i.liked:before,.swr-grupo .panel > .room > .msgs > li > div > .msg > .time > i.likes > i:hover:before
{
color: #ff0000;
}

.swr-grupo .panel > .room > .msgs > li.system
{
text-align: center;
opacity: 0.6;
transition: 0.2s;
}

.swr-grupo .panel > .room > .msgs > li.system > div > .msg > i
{
padding: 0px;
background: transparent;
box-shadow: 0px 0px 0px;
font-size: 11px;
display: inline-block;
background: #ffeb3b5c;
border-radius: 19px;
padding: 2px 12px;
}

.swr-grupo .panel > .room > .msgs > li.system > div > .msg > .time
{
margin: 0px;
padding: 0px;
text-align: center;
margin-top: -5px;
}

.swr-grupo .panel > .room > .msgs > li.system > div > .msg > .time .msgopt
{
display: none;
}

.swr-grupo .panel > .room > .msgs > li.system > div > .img
{
float: none;
display: inline-block;
margin: 0px;
}

.swr-grupo .panel > .room > .msgs > li.system > div > .msg
{
display: block;
}

.swr-grupo .panel > .room > .msgs > li.system > div i.status
{
display: none;
}

.swr-grupo .panel > .room > .msgs > li.system:hover
{
opacity: 1;
}

.swr-grupo .panel > .room > .msgs > li.right
{
text-align: right;
}

.swr-grupo .panel > .room > .msgs > li > div i.status
{
float: left;
border: 2px solid #fff;
margin-right: -5px;
position: relative;
z-index: 4;
}

.swr-grupo .panel > .room > .msgs > li.right > div i.status
{
float: right;
margin-top: 0px;
margin-left: -5px;
margin-right: 0px;
display: none;
}

.swr-grupo .panel > .room > .msgs > li > div i.usrname
{
display: inline-block;
font-style: normal;
cursor: pointer;
margin-right: 0px;
color: #E91E63;
font-weight: 600;
}

.swr-grupo .panel > .room > .msgs > li > div i.usrname:after
{
content: ":";
padding: 0px 3px;
}

.swr-grupo .panel > .room > .msgs > li.system > div i.usrname
{
margin: 0px;
margin-top: 0px;
text-align: center;
display: inline-block;
margin-right: 0px;
}

.swr-grupo .panel > .room > .msgs > li.highlight > div > .msg > i
{
cursor: pointer;
box-shadow: 0 0 0 rgba(0, 0, 0, 0.4);
animation: pulse 2s infinite;
}

.swr-grupo .panel > .room > .msgs > li.selected > div > .msg > i
{
cursor: pointer;
box-shadow: 0 0 0 rgba(0, 0, 0, 0.4);
animation: pulse 2s infinite;
}

.swr-grupo .panel > .room > .msgs > li.right > div > .msg > i
{
text-align: left;
}

.swr-grupo .panel > .room > .msgs > li.right > div > .img
{
float: right;
margin-right: 0px;
margin-left: 15px;
display: none;
}

.swr-grupo .panel > .room > .msgs > li.right > div > .msg > .time
{
text-align: right;
margin-left: 0px;
margin-right: 0px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > .info
{
font-style: normal;
float: right;
font-size: 10px;
font-weight: 600;
cursor: pointer;
margin-top: 3px;
padding: 0px 4px;
opacity: 0.8;
direction: ltr;
}

.swr-grupo .panel > .room > .msgs > li.system > div > .msg > i > .info
{
margin-top: 0px;
float: none;
display: inline-block;
padding: 0px 4px;
font-size: inherit;
font-weight: inherit;
opacity: 1;
}

.swr-grupo .panel > .room > .msgs > li.system > div
{
padding: 0px;
}

.swr-grupo .panel > .room > .msgs > li.system > div > .msg > i > .info:before
{
content: "(";
margin-right: 1px;
}

.swr-grupo .panel > .room > .msgs > li.system > div > .msg > i > .info:after
{
content: ")";
margin-left: 1px;
}

.swr-grupo .panel > .room > .msgs > li.system > div span.opts
{
display: none!important;
}

.swr-grupo .panel > .room > .msgs > li.right > div > .msg > i > .info > i.tick
{
margin-left: 4px;
margin-right: 2px;
display: inline;
}

.swr-grupo .panel > .room > .msgs > li.right > div > .msg > i > .info > i.tick.recieved > i:before,.swr-grupo .panel > .room > .msgs > li.right > div > .msg > i > .info > i.tick > i:before
{
content: '\e812';
font-family: "grupoico";
margin-right: -2px;
}

.swr-grupo .panel > .room > .msgs > li.right > div > .msg > i > .info > i.tick.recieved > i
{
transition: 0.3s;
}

.swr-grupo .panel > .room > .msgs > li.right > div > .msg > i > .info > i.tick.recieved,.swr-grupo .panel > .room > .msgs > li.right > div > .msg > i > .info > i.tick.sent
{
margin-right: 4px;
}

.swr-grupo .panel > .room > .msgs > li.right > div > .msg > i > .info > i.tick.read > i
{
color: #FFEB3B;
}

.swr-grupo .panel > .room > .msgs > li.right > div > .msg > i > .info > i.tick> i
{
font-style: normal;
}

.swr-grupo .panel > .room > .msgs > li.right > div > .msg > i > .info > i.tick.recieved > i
{
opacity: 0;
animation-name: fadeIn;
animation-duration: 0.8s;
animation-iteration-count: 1;
animation-fill-mode: forwards;
}

.swr-grupo .panel > .room > .msgs > li.right > div > .msg > i > .info > i.tick.recieved > i:first-child
{
animation-delay: 0.5s;
}

.swr-grupo .panel > .room > .msgs > li.right > div > .msg > i > .info > i.tick.sent > i:last-child,.swr-grupo .panel > .room > .msgs > li.right > div > .msg > i > .info > i.tick.sending> i:last-child
{
display: none;
}

.swr-grupo .panel > .room > .msgs > li.right > div > .msg > i > .info > i.tick.sending > i:before
{
content: '\e890';
}

.swr-grupo .panel > .room > .msgs > li.right > div > .msg > i > .info > i.tick.sending
{
-webkit-animation: rotating 1s linear infinite;
-moz-animation: rotating 1s linear infinite;
-ms-animation: rotating 1s linear infinite;
-o-animation: rotating 1s linear infinite;
animation: rotating 1s linear infinite;
display: inline-block;
}

.swr-grupo .panel > .room > .msgs > li.right > div > .msg > i > .info > i.tick.sending > i
{
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > i.rply
{
font-style: normal;
display: block;
opacity: 0.8;
text-align: left;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > i.rply > i
{
display: block;
font-style: normal;
margin-bottom: 0px;
padding: 0px;
cursor: pointer;
font-size: 12px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > i.rply > i > i
{
display: inline-block;
font-style: normal;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > i.rply > i > i:after
{
content: ":";
padding: 0px 3px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.audioplay
{
display: flex;
background: #607D8B;
padding: 5px;
align-items: center;
border-radius: 5px;
direction: ltr;
overflow: hidden;
text-align: left;
height: 45px;
margin-top: 2px;
margin-bottom: 2px;
justify-content: center;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.audioplay > span.seek
{
display: inline-block;
padding: 0px 0px;
height: 8px;
margin-right: 6px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.audioplay > span.seek > i.bar
{
width: 100%;
height: 3px;
background: #616161;
display: block;
border-radius: 3px;
padding-right: 5%;
cursor: pointer;
transition: 0.25s;
position: relative;
top: -18px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.audioplay > span.seek > #seekslider
{
height: 3px;
position: relative;
width: 100%;
opacity: 0;
cursor: pointer;
z-index: 6;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.audioplay > span.seek > i.duration
{
display: block;
opacity: 0;
margin-top: 3px;
padding: 0px 0px;
transition: 0.2s;
position: relative;
top: -20px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.audioplay > span.seek > i.duration > i
{
font-style: normal;
display: inline-block;
font-size: 9px;
color: white;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.audioplay > span.seek > i.duration > i.tot
{
float: right;
margin-top: 4px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.audioplay > span.icon
{
display: inline-block;
background: #3f535d;
width: 35px;
margin-top: -0.5px;
height: 35px;
border-radius: 100%;
float: right;
color: white;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.audioplay > span.icon:before
{
display: block;
padding: 8px 11px;
font-size: 20px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.audioplay > span.play
{
padding: 2px 11px;
font-size: 20px;
display: inline-block;
text-align: center;
width: 35px;
height: 100%;
float: left;
color: white;
cursor: pointer;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.audioplay > span.play:before
{
content: '\e897';
font-family: "grupoico";
display: block;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.audioplay > span.play.pause:before
{
content: '\e899';
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.audioplay > span.seek > i.bar > i
{
content: "";
background: #fdfdfd;
width: 10px;
height: 10px;
display: block;
border-radius: 100%;
position: relative;
top: -4px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.preview
{
overflow: hidden;
max-width: 180px;
direction: ltr;
max-height: 120px;
margin-top: 2px;
display: flex;
align-items: center;
background: #333 url('gem/ore/grupo/global/load.gif')no-repeat;
background-position: center;
background-size: 50px;
border-radius: 5px;
cursor: pointer;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.preview.video
{
background: #333;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.preview.video > span > canvas
{
width: 100%;
object-fit: cover;
height: 100%;
opacity: 0;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.preview.video > span > img
{
width: 100%;
height: 100%;
object-fit: cover;
}

.videothumbgen
{
position: absolute;
bottom: 0px;
z-index: 99;
width: 200px;
height: 200px;
right: 36px;
bottom: 35px;
}

.videothumbgen > video
{
width: 100%;
height: 100%;
}

.videothumbgen > video > canvas
{
width: 200px;
height: 200px;
opacity: 0;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.preview.video > span
{
display: block;
width: 160px;
height: 100px;
text-align: center;
background: url('gem/ore/grupo/global/playbtn.png')no-repeat;
background-position: center;
background-size: 40px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.preview > span
{
display: inline-block;
text-align: center;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.preview > span > img
{
max-width: 180px;
max-height: 120px;
cursor: zoom-in;
min-width: 100px;
object-fit: cover;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.block
{
display: inline-block;
text-align: left;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.block.dwnldfile
{
cursor: pointer;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.block > i
{
display: inline-block;
border-radius: 100%;
font-style: normal;
padding: 5px 8px;
background: linear-gradient(to right,#F44336,#9C27B0);
cursor: pointer;
color: #fff;
float: right;
margin-top: 5px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.block > span
{
display: inline-block;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.block > span > span
{
display: inline-block;
margin-left: 4px;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.block > i
{
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.block > i > i
{
font-family: "grupoico";
font-style: normal;
font-size: 12px;
cursor: pointer;
display: block;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.block > i > i:after
{
content: "\1f4e5";
}

.swr-grupo .panel > .head
{
color: #8b8e90;
background: white;
padding: 10px 15px;
border-bottom: 1px solid #dfe7ef;
position: absolute;
width: 100%;
height: 60px;
z-index: 9;
display: flex;
align-items: center;
justify-content: center;
}

.swr-grupo .panel > .head > .left > span > span > .typing
{
padding: 0px;
list-style: none;
font-size: 12px;
display: block;
font-weight: 500;
color: #8b8e90;
margin: 0px;
margin-top: -2px;
}

.swr-grupo .panel > .head > .left > span > span > .typing > li
{
display: none;
}

.swr-grupo .panel > .head > .left > span > span > .typing > li > span
{
max-width: 75px;
height: 18px;
margin-right: 2px;
white-space: pre;
overflow: hidden;
display: inline-flex;
}

.swr-grupo .panel > .head > .left
{
display: inline-block;
max-width: 60%;
overflow: hidden;
}

.swr-grupo .panel > .head > .left > span
{
display: flex;
align-items: center;
}

.swr-grupo .panel > .head > .left > span > img
{
width: 30px;
border-radius: 4px;
display: inline-block;
margin-right: 6px;
}

.swr-grupo .panel > .head > .left > span > span
{
display: inline-block;
font-weight: 600;
font-size: 13px;
color: #E91E63;
}

.swr-grupo .panel > .head > .left > span > span > span
{
display: block;
font-size: 12px;
font-weight: 500;
color: #8b8e90;
margin-top: -2px;
}

.swr-grupo .panel > .head > .right
{
margin-left: auto;
display: inline-flex;
align-items: center;
}

.swr-grupo .panel > .head > .right > i
{
padding: 5px;
cursor: pointer;
font-size: 19px;
margin-left: 4px;
}

.swr-grupo .panel > .textbox
{
position: absolute;
bottom: -4px;
width: 100%;
z-index: 99;
min-height: 70px;
}

.swr-grupo .panel > .textbox > .mentions
{
position: relative;
z-index: 5;
margin-top: 10px;
bottom: 0px;
background: white;
margin-left: 10px;
border-radius: 7px;
display: none;
}

.swr-grupo .panel > .textbox > .mentions > ul
{
padding: 0px;
margin: 0px;
list-style: none;
}

.swr-grupo .panel > .textbox > .mentions > ul > li
{
font-size: 14px;
padding: 0px 12px;
max-width: 190px;
overflow: hidden;
float: left;
cursor: pointer;
}

.swr-grupo .panel > .textbox > .mentions > ul > li > img
{
width: 35px;
float: left;
margin-right: 6px;
border-radius: 3px;
margin-top: 4px;
}

.swr-grupo .panel > .textbox > .mentions > ul > li > span
{
display: inline-block;
max-width: 100px;
overflow: hidden;
font-size: 13px;
}

.swr-grupo .panel > .textbox > .mentions > ul > li > span > i
{
display: block;
font-weight: 600;
font-style: normal;
font-size: 13px;
color: #a2a2a2;
}

.swr-grupo .panel > .textbox > .mentions > ul > li:last-child
{
border: 0px;
}

.swr-grupo .panel > .textbox > .mentions > ul > li:hover
{
}

.swr-grupo .panel > .textbox > .box
{
display: block;
padding: 12px;
width: 100%;
position: relative;
background: #f7f9fb;
box-shadow: 0px -1px 2px #dfe7ef;
z-index: 9;
display: flex;
align-items: center;
justify-content: center;
}

.swr-grupo .panel > .textbox > .box > textarea
{
width: 100%;
display: block;
border: 0px;
outline: none;
resize: none;
padding: 10px 15px;
min-height: 44px;
max-height: 180px;
color: #676767;
overflow: scroll;
overflow-x: hidden;
font-size: 13px;
border: 1px solid #e2e2e2;
background: #ffffff;
border-radius: 31px;
}

.swr-grupo .panel > .textbox > .box > .icon
{
margin-left: 15px;
display: inline-flex;
font-size: 21px;
color: #828588cf;
z-index: 99;
}

.swr-grupo .panel > .textbox > .box > .icon.left
{
margin-right: 15px;
margin-left: 0px;
}

.grgif
{
width: 100%;
border-radius: 0px;
position: absolute;
height: 260px;
bottom: 0px;
overflow: hidden;
display: none;
transition: 0.2s;
background: #f7f9fb;
box-shadow: 0px -1px 2px #dfe7ef;
z-index: 7;
margin-bottom: 72px;
}

.grgif > .wrap
{
padding: 10px 0px;
}

.grgif > .wrap > .search
{
display: block;
margin-bottom: 10px;
padding: 0px 10px;
}

.grgif > .wrap > .search > input
{
width: 100%;
border: 0px;
background: #e2e7ec;
padding: 9px 10px;
border-radius: 7px;
outline: none;
font-size: 13px;
height: 40px;
font-weight: 600;
color: #989898;
}

.grgif > .wrap > div
{
height: 200px;
text-align: center;
position: relative;
width: 100%!important;
display: block;
}

.grgif > .wrap > div > span.loading
{
width: 100%;
position: absolute;
display: none;
background: #f7f9fb url(gem/ore/grupo/global/load.gif) no-repeat;
height: 200px;
background-size: 50px;
background-position: CENTER;
left: 0px;
}

.grgif > .wrap > div > .grgifconts
{
line-height: 0;
-webkit-column-count: 4;
-webkit-column-gap: 0px;
-moz-column-count: 4;
-moz-column-gap: 0px;
list-style: none;
column-count: 4;
column-gap: 0px;
padding: 0px 10px;
}

.grgif > .wrap > div > .grgifconts > li
{
width: 100% !important;
height: auto !important;
padding: 2px;
cursor: pointer;
}

.grgif > .wrap > div > .grgifconts > li > img
{
width: 100% !important;
height: auto !important;
}

.gr-emoji
{
background: url('gem/ore/grupo/icons/emoji.svg')no-repeat;
background-position: center;
background-size: 21px;
}

.gr-gif
{
background: url('gem/ore/grupo/icons/gif.svg')no-repeat;
background-position: center;
background-size: 20px;
}

.gr-qrcode
{
background: url('gem/ore/grupo/icons/qrcode.svg')no-repeat;
background-position: center;
background-size: 20px;
}

.gr-mrec.record
{
background: url('gem/ore/grupo/icons/mic.svg')no-repeat;
background-position: center;
background-size: 20px;
}

.gr-mrec.stop
{
background: url('gem/ore/grupo/icons/record.svg')no-repeat;
background-position: center;
background-size: 20px;
}

.gr-qrcode.active
{
filter: invert(27%) sepia(51%) saturate(2878%) hue-rotate(325deg) brightness(100%) contrast(98%);
opacity: 1!important;
}

.gr-response
{
background: url(gem/ore/grupo/icons/response.svg)no-repeat;
background-position: center;
background-size: 60%;
}

.gr-mic
{
position: relative;
top: 0px;
}

.swr-grupo .panel > .textbox > .box > .icon > .gr-moreico
{
cursor: pointer;
display: inline-flex;
width: 21px;
height: 21px;
margin-right: 7px;
position: relative;
color: transparent;
padding: 0px;
}

.swr-grupo .panel > .textbox > .box > .icon > .gr-moreico.active > ul
{
display: block;
}

.swr-grupo .panel > .textbox > .box > .icon > .gr-moreico > ul
{
display: none;
position: absolute;
bottom: 0px;
margin: 0px;
opacity: 1;
padding: 0px;
margin-bottom: 25px;
margin-left: -9px;
}

.swr-grupo .panel > .textbox > .box > .icon > .gr-moreico > ul > li > span:hover
{
background: linear-gradient(to right,#E91E63,#9C27B0);
}

.swr-grupo .panel > .textbox > .box > .icon > .gr-moreico > ul > li > span form.atchmsg
{
position: absolute;
margin-left: -26px;
width: 48px;
opacity: 0;
display: inline-block;
overflow: hidden;
margin-top: -9px;
cursor: pointer;
}

.swr-grupo .panel > .textbox > .box > .icon > .gr-moreico > i.icon
{
background: url(gem/ore/grupo/icons/more.svg)no-repeat;
background-position: center;
background-size: 21px;
border: 0px!important;
display: block;
width: 21px;
height: 21px;
opacity: 0.3;
}

.swr-grupo .panel > .textbox > .box > .icon > .gr-moreico > i.icon:hover
{
opacity: 1;
}

.swr-grupo .panel > .textbox > .box > .icon > .gr-moreico.recording > i.icon
{
background: url(gem/ore/grupo/icons/record.svg)no-repeat;
background-position: center;
background-size: 21px;
border: 0px!important;
filter: none!important;
display: block;
width: 21px;
height: 21px;
opacity: 1;
-webkit-animation-duration: 1s;
-webkit-animation-fill-mode: both;
animation-duration: 1s;
animation-fill-mode: both;
-webkit-animation-iteration-count: infinite;
animation-iteration-count: infinite;
-webkit-animation-name: fadeIn;
animation-name: fadeIn;
}

.swr-grupo .panel > .textbox > .box > .icon > .gr-moreico.qrcode > i.icon
{
background: url(gem/ore/grupo/icons/qrcode.svg)no-repeat;
background-position: center;
background-size: 21px;
border: 0px!important;
display: block;
width: 21px;
height: 21px;
opacity: 1;
-webkit-animation-duration: 1s;
-webkit-animation-fill-mode: both;
animation-duration: 1s;
animation-fill-mode: both;
-webkit-animation-iteration-count: infinite;
animation-iteration-count: infinite;
-webkit-animation-name: fadeIn;
animation-name: fadeIn;
}

.swr-grupo .panel > .textbox > .box > .icon > .gr-moreico > ul > li > span
{
background-color: #ffffff;
display: flex;
border-radius: 100%;
padding: 7px;
box-shadow: 0px 0px 2px #737373;
text-align: center;
}

.swr-grupo .panel > .textbox > .box > .icon > .gr-moreico > ul > li > span > i
{
width: 20px;
height: 20px;
display: block;
opacity: 0.5;
}

.swr-grupo .panel > .textbox > .box > .icon > .gr-moreico > ul > li > span:hover > i
{
opacity: 1;
filter: invert(35%) sepia(29%) saturate(2879%) hue-rotate(325deg) brightness(300%) contrast(312%);
opacity: 1!important;
}

.swr-grupo .panel > .textbox > .box > .icon > .gr-moreico > ul > li
{
margin-bottom: 5px;
}

.swr-grupo .panel > .textbox > .box > .icon > i.gr-mic.recrdng
{
opacity: 1;
}

.gr-mic.recrdng > .mstart
{
display: none;
}

.gr-mic .mstart
{
background: url(gem/ore/grupo/icons/mic.svg)no-repeat;
background-position: center;
background-size: 21px;
border: 0px;
width: 100%;
outline: none;
height: 100%;
display: block;
}

.gr-mic.recrdng > .mstop
{
display: block!important;
cursor: pointer;
}

.gr-mic.recrdng > .mstop
{
display: none;
background: url(gem/ore/grupo/icons/record.svg)no-repeat;
background-position: center;
background-size: 21px;
border: 0px;
width: 100%;
outline: none;
height: 100%;
}

.gr-mic.recrdng > .mstop > span
{
font-style: normal;
font-weight: 600;
display: inline-block;
font-size: 12px;
color: grey;
}

.gr-mic.recrdng > .mstop > i
{
position: relative;
top: 1px;
display: inline-block;
margin-left: 4px;
color: #4f555ac7;
}

.gr-mic.recrdng > .mstop > span > i
{
font-style: normal;
display: inline-block;
width: 8px;
height: 8px;
border-radius: 100%;
background: red;
top: 0px;
position: relative;
margin-right: 3px;
}

.gr-attach
{
background: url(gem/ore/grupo/icons/attach.svg)no-repeat;
background-position: center;
background-size: 20px;
border: 0px!important;
}

.swr-grupo .panel > .textbox > .box > .icon > i
{
cursor: pointer;
display: inline-flex;
width: 21px;
height: 21px;
margin-right: 7px;
color: transparent;
padding: 0px;
opacity: 0.3;
}

.swr-grupo .panel > .textbox > .box > .icon > i:hover
{
opacity: 1;
}

.swr-grupo .panel > .textbox > .box > .icon > i > form
{
position: absolute;
margin-left: -9px;
width: 33px;
opacity: 0;
display: inline-block;
overflow: hidden;
margin-top: -5px;
cursor: pointer;
}

.swr-grupo .panel > .textbox > .box > i
{
color: white;
max-width: 45px;
margin-left: 5px;
display: none;
padding: 5px;
border-radius: 100%;
cursor: pointer;
background: linear-gradient(to right,#F44336,#9C27B0);
}

.swr-grupo .panel > .textbox > .box > i > i
{
background: url(gem/ore/grupo/icons/send.svg)no-repeat;
background-position: center;
background-size: contain;
display: block;
height: 24px;
width: 24px;
}

.swr-menu
{
position: absolute;
z-index: 1000;
background: linear-gradient(to right,#E91E63,#9C27B0);
font-weight: 500;
color: #ffffff;
font-style: normal;
display: none;
border-radius: 4px;
line-height: 1;
max-height: 365px;
max-height: 80vh;
overflow: hidden;
overflow-y: scroll;
}

.swr-menu.l-end
{
right: 0px;
margin-right: 45px;
}

.swr-menu.r-end
{
right: 0px;
margin-right: 10px;
}

.swr-menu > ul
{
cursor: pointer;
list-style: none;
font-size: 14px;
width: max-content;
padding: 0px;
text-align: left;
margin: 0px;
}

.swr-menu > ul > li
{
padding: 7px 10px;
cursor: pointer;
}

.swr-menu > ul > li:hover,.swr-menu > ul > li.active
{
background: #10101038;
}

.swr-menu > ul > li > img
{
width: 15px;
margin-right: 6px;
}

.gr-prvlink
{
display: none;
}

.gr-prvlink > div > i.submt
{
position: absolute;
z-index: 99;
color: white;
cursor: pointer;
background: #E91E63;
font-style: normal;
padding: 1px 7px;
bottom: 0px;
margin-bottom: 10px;
border-radius: 20px;
right: 0px;
margin-right: 7px;
font-size: 13px;
font-weight: 600;
}

.gr-prvlink > div > i.gi-cancel
{
color: white;
position: absolute;
right: 0px;
z-index: 99;
background: black;
padding: 4px 8px;
margin-right: -5px;
margin-top: -6px;
cursor: pointer;
font-size: 15px;
box-shadow: 0px 0px 4px #44444461;
border-radius: 100%;
}

.gr-prvlink > div
{
position: absolute;
z-index: 150;
width: 256px;
height: 144px;
box-shadow: 0px 0px 4px #44444461;
border: 1px solid #d4d4d4;
}

.gr-prvlink > div > img
{
border: 0px;
width: 100%;
height: 100%;
}

.gr-prvlink > div > span
{
position: absolute;
width: 100%;
object-fit: cover;
height: 100%;
z-index: 9;
}

.gr-prvlink > div > span > span.loading.error
{
background: #333 url(gem/ore/grupo/icons/error.svg)no-repeat;
background-position: center;
background-size: 50px;
}

.gr-prvlink > div > span > span.loading
{
width: 100%;
height: 100%;
background: #333 url(gem/ore/grupo/global/load.gif)no-repeat;
background-position: center;
background-size: 50px;
z-index: 9;
display: none;
text-align: center;
}

.grupo-preview
{
z-index: 100;
}

.grupo-preview > div
{
text-align: center;
}

.grupo-preview > div > .loader
{
display: none;
background: white;
border-radius: 50px;
box-shadow: 0px 0px 4px #dcdcdc;
width: 90px;
height: 90px;
padding-top: 5px;
text-align: center;
position: absolute;
top: 0px;
left: 0px;
z-index: 80;
}

.grupo-preview > div .prclose
{
font-size: 17px;
z-index: 99;
position: absolute;
cursor: pointer;
right: -5px;
margin-top: -10px;
}

.grupo-preview > div .prclose:before
{
color: white;
background: black;
content: '\e813';
font-family: "grupoico";
speak: none;
padding: 2px 7px;
border-radius: 100%;
font-style: normal;
font-weight: normal;
font-variant: normal;
text-transform: none;
line-height: 0;
-webkit-font-smoothing: antialiased;
-moz-osx-font-smoothing: grayscale;
}

.grupo-preview > div .prdrag
{
font-size: 14px;
z-index: 99;
position: absolute;
cursor: pointer;
right: 33px;
margin-top: -7px;
}

.grupo-preview > div .prdrag:before
{
color: white;
background: black;
content: '\e969';
font-family: "grupoico";
speak: none;
padding: 2px 3px;
border-radius: 100%;
font-style: normal;
font-weight: normal;
font-variant: normal;
text-transform: none;
line-height: 0;
border: 1px solid #ffffffbd;
-webkit-font-smoothing: antialiased;
-moz-osx-font-smoothing: grayscale;
}

.grupo-preview > div > .loader > div > div
{
background: #c7c7c7;
}

.grupo-preview > div > .img
{
display: none;
position: absolute;
top: 0px;
left: 0px;
z-index: 81;
}

.grupo-preview > div > .img > div
{
border-radius: 5px;
overflow: hidden;
}

.grupo-preview > div > .img > div > img
{
}

.grupo-preview > div > .video
{
display: none;
position: absolute;
top: 0px;
left: 0px;
z-index: 81;
}

.grupo-preview > div > .video > div
{
}

.grupo-preview > div > .video > div > video
{
width: auto;
max-height: 500px;
border-radius: 5px;
}

.grupo-video
{
position: fixed;
bottom: 0px;
z-index: 999;
left: 0px;
width: 100%;
height: 100%;
text-align: center;
display: none;
background-color: #000000e0;
background-image: url(gem/ore/grupo/icons/loading.svg);
background-repeat: no-repeat;
background-position: center;
background-size: 80px;
}

.grupo-preview > div > .embed > div
{
border-radius: 5px;
overflow: hidden;
}

.grupo-preview > div > .embed
{
display: none;
position: absolute;
top: 0px;
left: 0px;
z-index: 81;
}

.grupo-preview > div > .embed > div > iframe
{
border: 0px;
}

.grupo-video > div
{
display: -webkit-box;
display: -webkit-flex;
display: -ms-flexbox;
display: flex;
-webkit-box-align: center;
-webkit-align-items: center;
-ms-flex-align: center;
align-items: center;
min-height: 100%;
-webkit-box-pack: center;
-webkit-justify-content: center;
-ms-flex-pack: center;
justify-content: center;
width: 100%;
height: 100%;
}

.grupo-video > div > div
{
display: inline-block;
text-align: right;
color: white;
width: 70%;
height: 70%;
}

.grupo-video > div > div > iframe
{
display: block;
width: 100%;
height: 100%;
}

.grupo-video > div > div > span
{
display: block;
color: white;
margin-bottom: 11px;
font-size: 18px;
font-weight: 600;
cursor: pointer;
}

.grupo-standby
{
display: none;
position: fixed;
width: 100%;
top: 0px;
left: 0px;
height: 100%;
animation: standby 2s infinite;
-webkit-animation: standby 2s infinite;
-moz-animation: standby 2s infinite;
-o-animation: standby 2s infinite;
cursor: pointer;
}

@-webkit-keyframes standby
{
0%, 20%, 50%, 80%, 100%
{
-webkit-transform: translateY(0);
}

40%
{
-webkit-transform: translateY(-30px);
}

60%
{
-webkit-transform: translateY(-15px);
}
}

@-moz-keyframes standby
{
0%, 20%, 50%, 80%, 100%
{
-moz-transform: translateY(0);
}

40%
{
-moz-transform: translateY(-30px);
}

60%
{
-moz-transform: translateY(-15px);
}
}

@-o-keyframes standby
{
0%, 20%, 50%, 80%, 100%
{
-o-transform: translateY(0);
}

40%
{
-o-transform: translateY(-30px);
}

60%
{
-o-transform: translateY(-15px);
}
}

@keyframes standby
{
0%, 20%, 50%, 80%, 100%
{
transform: translateY(0);
}

40%
{
transform: translateY(-30px);
}

60%
{
transform: translateY(-15px);
}
}

.grupo-standby > div
{
display: -webkit-box;
display: -webkit-flex;
display: -ms-flexbox;
display: flex;
-webkit-box-align: center;
-webkit-align-items: center;
-ms-flex-align: center;
align-items: center;
min-height: 100%;
-webkit-box-pack: center;
-webkit-justify-content: center;
-ms-flex-pack: center;
justify-content: center;
}

.grupo-standby > div > span
{
width: 150px;
display: block;
}

.grupo-standby > div > span > img
{
width: 100%;
}

.grupo-pop
{
position: fixed;
bottom: 0px;
z-index: 99;
left: 0px;
width: 100%;
height: 100%;
text-align: center;
display: none;
background: linear-gradient(to right,#000000,#252525);
}

.grformspin
{
display: none;
background: #f5f5f51f;
height: 100%;
position: absolute;
z-index: 9;
width: 100%;
left: 0px;
}

.grformspin > span
{
background: url(gem/ore/grupo/global/load.gif) no-repeat;
height: 100%;
background-position: center;
background-size: 60px;
display: inline-block;
width: 100%;
}

.grformspin.error > span
{
background: url(gem/ore/grupo/global/error.png) no-repeat;
background-position: center;
background-size: 100px;
}

.grupo-pop > div
{
display: -webkit-box;
display: -webkit-flex;
display: -ms-flexbox;
display: flex;
-webkit-box-align: center;
-webkit-align-items: center;
-ms-flex-align: center;
align-items: center;
min-height: 100%;
-webkit-box-pack: center;
-webkit-justify-content: center;
-ms-flex-pack: center;
justify-content: center;
}

.grupo-pop > div > form
{
display: inline-block;
background: #000000;
background: linear-gradient(to right,#232630,#252d40);
text-align: center;
box-shadow: 0px 0px 6px #00000085;
border-radius: 5px;
color: white;
width: 300px;
position: relative;
}

.grupo-pop > div > form .hidopts
{
display: none;
}

.grupo-pop > div > form .hidopts.shw
{
display: block;
}

.grupo-pop > div > form > .head
{
display: block;
margin-bottom: 0px;
text-align: center;
font-size: 14px;
font-weight: 600;
padding: 14px 0px;
background: linear-gradient(to right,#E91E63,#9C27B0);
border-radius: 5px 5px 0px 0px;
}

.grupo-pop > div > form > .search
{
background: #181a21;
border-right: 0px;
border-left: 0px;
height: 50px;
display: block;
z-index: 9;
}

.grupo-pop > div > form .selectinp > input
{
cursor: pointer;
}

.grupo-pop > div > form > .search > i
{
position: absolute;
padding: 17px 0px;
padding-bottom: 0px;
padding-left: 30px;
color: #e4e4e4;
left: 0px;
}

.grupo-pop > div > form > .search > input
{
outline: 0px;
width: 100%;
background: transparent;
padding: 10px 13px;
color: #e2e2e2;
padding-left: 48px;
font-size: 14px;
border: 0px;
height: 100%;
}

.grupo-pop > div > form > div
{
padding: 0px 30px;
max-height: 300px;
overflow: hidden;
overflow-y: auto;
margin-top: 5px;
}

.grupo-pop > div > form > div > div >.imglist
{
list-style: none;
padding: 0px;
}

.grupo-pop > div > form > div > div > .imglist > li
{
display: inline-block;
padding: 2px 2px;
cursor: pointer;
}

.grupo-pop > div > form > div > div > .imglist > li.active
{
opacity: 0.3;
}

.grupo-pop > div > form > div > div > .imglist > li > img
{
width: 52px;
border: 2px solid white;
}

.grupo-pop > div > form > div > div > .imglist > li > input
{
opacity: 0;
width: 0px;
}

.grupo-pop > div > form > div > div > label
{
display: block;
color: #ffffffd1;
text-align: left;
font-size: 14px;
padding: 8px 0px;
}

.grupo-pop > div > form > .fields > div > span
{
display: block;
background: #35353500;
border: 0px;
border-bottom: 1px solid #ffffff63;
outline: 0px;
color: #9fabb1e3;
border-radius: 0px;
padding: 10px 0px;
cursor: pointer;
margin-bottom: 3px;
text-align: left;
}

.grupo-pop > div > form > .fields > div > span > span
{
display: block;
}

.grupo-pop > div > form > div > div > textarea
{
overflow: hidden;
resize: none;
min-height: 27px;
}

.grupo-pop > div > form > div > div > input,.grupo-pop > div > form > div > div > select,.grupo-pop > div > form > div > div > textarea
{
display: block;
background: transparent;
border: 0px;
border-bottom: 1px solid;
outline: 0px;
color: #9fabb1e3;
border-radius: 0px;
padding: 0px 0px;
padding-bottom: 5px;
width: 100%;
margin-bottom: 5px;
}

.grupo-pop > div > form > div > div > select > option
{
outline: none;
background: #232630;
}

.grupo-pop > div > form > input[type="submit"]
{
background: linear-gradient(to right,#E91E63,#9C27B0);
border: 0px;
border-radius: 66px;
color: white;
width: 100%;
padding: 8px 0px;
font-size: 14px;
margin-top: 21px;
font-weight: 600;
outline: none;
width: 200px;
}

.grupo-pop > div > form > .fields > div > div.checkbox
{
text-align: left;
color: #9fabb1e3;
}

.grupo-pop > div > form > .fields > div > div.checkbox > span > input
{
margin-right: 4px;
float: left;
margin-top: 6px;
}

.grupo-pop > div > form > .fields > div > div.checkbox >span
{
margin-right: 4px;
font-size: 15px;
display: block;
}

.grupo-pop > div > form > span.cancel
{
display: block;
font-size: 13px;
margin-top: 11px;
color: #c7c7c796;
margin-bottom: 22px;
cursor: pointer;
position: relative;
z-index: 99;
}

.swr-grupo .rside
{
background: white;
padding: 0px;
z-index: 3;
height: 100%;
border-left: 1px solid #dfe7ef;
}

.swr-grupo .rside > .top
{
color: #8b8e90;
background: white;
padding: 9px 15px;
display: flex;
width: 100%;
height: 60px;
position: absolute;
z-index: 7;
}

.swr-grupo .rside > .top > .left
{
display: inline-flex;
align-items: center;
}

.swr-grupo .panel > .head > .icon,.swr-grupo .rside > .top > .left > .icon
{
margin-top: 0px;
cursor: pointer;
font-weight: 500;
font-size: 35px;
padding: 10px 15px;
opacity: 0.9;
padding-left: 0px;
}

.swr-grupo .rside > .top > .left > span
{
display: flex;
align-items: center;
}

.swr-grupo .rside > .top > .left > span > img
{
width: 41px;
height: 41px;
border-radius: 100%;
display: inline-block;
margin-right: 9px;
}

.swr-grupo .rside > .top > .left > span > span
{
display: inline-block;
font-weight: 600;
font-size: 13px;
color: #5a5a5a;
line-height: 14px;
}

.swr-grupo .rside > .top > .left > span > span > span
{
display: block;
font-size: 12px;
font-weight: 500;
color: #8b8e90;
}

.swr-grupo .rside > .top > .right
{
float: right;
position: absolute;
right: 0px;
margin-right: 15px;
}

.swr-grupo .rside > .top > .right > i
{
display: block;
font-size: 18px;
}

.swr-grupo .rside > .top > .right > i.langswitch
{
padding-top: 3px;
}

.swr-grupo .rside > .top > .right > i.langswitch > img
{
width: 20px;
border-radius: 100%;
}

.swr-grupo .opt
{
display: block;
}

.swr-grupo .opt > i
{
font-style: normal;
}

.swr-grupo .opt > ul
{
text-align: left;
display: none;
background: white;
padding: 0px;
border: 1px solid #dfe7ef;
border-radius: 5px;
margin-left: -100px;
z-index: 99;
position: relative;
}

.swr-grupo .opt > ul > li
{
display: inline;
padding: 3px 7px;
}

.swr-grupo .opt > ul > li:hover
{
background: linear-gradient(to right,#E91E63,#9C27B0);
color: white;
border-radius: 3px;
}

.swr-grupo i.status
{
background: #939491;
padding: 4px;
border-radius: 100%;
display: inline-block;
margin-bottom: 3px;
}

.swr-grupo i.status.online
{
background: #8BC34A;
}

.swr-grupo i.status.idle
{
background: #FFC107;
}

.swr-grupo .zeroelem > .welcome
{
}

.swr-grupo .zeroelem > .welcome > span
{
padding: 0px 20%;
}

.swr-grupo .zeroelem > .welcome > span > img
{
max-width: 80%;
max-height: 340px;
object-fit: cover;
}

.swr-grupo .zeroelem > .welcome > span > i
{
color: #6b6b6b;
}

.swr-grupo .zeroelem > .welcome > span > i.title
{
font-size: 21px;
display: block;
font-weight: 500;
margin-top: 21px;
line-height: 18px;
}

.swr-grupo .zeroelem > .welcome > span > i.desc
{
font-size: 15px;
display: block;
font-weight: 500;
margin-top: 12px;
line-height: 18px;
}

.swr-grupo .zeroelem > .welcome > span> i.foot
{
font-size: 13px;
display: block;
font-weight: 500;
margin-top: 22px;
line-height: 17px;
border-top: 1px solid #d6d6d6;
padding-top: 12px;
}

.swr-grupo .aside,.swr-grupo .panel
{
--animate-duration: 0.5s;
}

.swr-grupo .zeroelem
{
display: -webkit-box;
display: -webkit-flex;
display: -ms-flexbox;
display: flex;
-webkit-box-align: center;
-webkit-align-items: center;
-ms-flex-align: center;
align-items: center;
min-height: 85%;
-webkit-box-pack: center;
-webkit-justify-content: center;
-ms-flex-pack: center;
justify-content: center;
}

.swr-grupo .zeroelem > div
{
}

.swr-grupo .zeroelem > div > span
{
font-size: 57px;
text-align: center;
display: block;
font-weight: 700;
line-height: 39px;
color: #c3c7ca;
}

.swr-grupo .zeroelem > div > span > i
{
font-style: normal;
display: inline-block;
color: #0000000f;
font-size: 92px;
}

.swr-grupo .uploadfiles
{
position: absolute;
opacity: 0;
overflow: hidden;
width: 100%;
height: 23px;
margin-left: -9px;
margin-top: -2px;
}

.swr-grupo .zeroelem > div > span > span
{
display: block;
font-size: 13px;
font-weight: 500;
margin-top: 0px;
}

.swr-grupo .msgopt
{
display: inline-block;
}

.swr-grupo .msgopt > i
{
margin-left: 4px;
font-size: 10px;
display: inline-block;
cursor: pointer;
}

.swr-grupo .msgopt > ul
{
text-align: left;
display: none;
background: #f7f9fb;
margin: 0px;
border-radius: 5px;
z-index: 99;
position: relative;
padding: 0px;
list-style: none;
top: -1px;
margin-left: 3px;
}

.swr-grupo .msgopt > ul > li
{
display: inline;
padding: 2px 5px;
cursor: pointer;
}

.swr-grupo .msgopt > ul > li:hover
{
background: linear-gradient(to right,#F44336,#9C27B0);
color: white;
border-radius: 3px;
}

.swr-grupo .msgopt > ul > li.autodel
{
cursor: default;
}

.swr-grupo .msgopt > ul > li.autodel:before
{
content: "\1f554";
font-family: "grupoico";
speak: none;
font-style: normal;
font-weight: normal;
font-variant: normal;
text-transform: none;
line-height: 1;
margin-right: 3px;
-webkit-font-smoothing: antialiased;
-moz-osx-font-smoothing: grayscale;
}

.swr-grupo .msgopt > ul > li.autodel:hover
{
background: transparent;
color: inherit;
}

.imgld
{
background: none!important;
}

.emojionearea .emojionearea-button,.emojionearea .emojionearea-button:hover
{
top: 7px;
display: block;
left: -40px;
width: 28px;
height: 28px;
z-index: 99;
opacity: 0;
}

.emojionearea .emojionearea-picker.emojionearea-picker-position-top
{
right: 0px;
}

.emojionearea.focused
{
border: 0px solid #CCC;
outline: 0;
-moz-box-shadow: inset 0 0px 0px rgba(0,0,0,.075), 0 0 0px rgba(102,175,233,.6);
-webkit-box-shadow: inset 0 0px 0px rgba(0,0,0,.075), 0 0 0px rgba(102,175,233,.6);
box-shadow: inset 0 0px 0px rgba(0,0,0,.075), 0 0 0px rgba(102,175,233,.6);
border: 1px solid #e2e2e2!important;
background: #ffffff;
}

.emojionearea, .emojionearea.form-control
{
border: 0px solid #e2e2e2;
display: grid;
background: transparent;
border-radius: 31px;
outline: none!important;
border: 1px solid #e2e2e2!important;
background: #ffffff;
padding: 12px 12px;
}

.emojionearea .emojionearea-picker.emojionearea-picker-position-top
{
right: auto;
left: 0px;
margin-left: -60px;
bottom: 0px;
top: auto;
margin-top: 0px!important;
margin-bottom: 45px;
border-radius: 15px 15px 0px 0px;
}

.emojionearea .emojionearea-picker.emojionearea-picker-position-top .emojionearea-wrapper:after
{
background-position: -2px -49px;
bottom: -10px;
left: 16px;
}

.emojionearea > .emojionearea-editor
{
width: 100%;
word-break: break-all;
display: block;
border-radius: 0px;
outline: none!important;
resize: none;
padding: 0px;
min-height: 20px;
max-height: 180px;
color: #676767;
font-size: 13px;
border: 0px;
}

img
{
-webkit-user-drag: none;
-khtml-user-drag: none;
-moz-user-drag: none;
-o-user-drag: none;
user-drag: none;
}

::placeholder
{
color: inherit;
opacity: 1;
}

:-ms-input-placeholder
{
color: inherit;
}

::-ms-input-placeholder
{
color: inherit;
}

input:focus::-webkit-input-placeholder
{
color: transparent;
}

input:focus:-moz-placeholder
{
color: transparent;
}

input:focus::-moz-placeholder
{
color: transparent;
}

input:focus:-ms-input-placeholder
{
color: transparent;
}

input[type=file], input[type=file]::-webkit-file-upload-button
{
cursor: pointer;
}

.ajxout
{
right: auto;
left: 50%;
transform: translateX(-50%);
top: 8px!important;
}

@media screen and (min-width:770.98px)
{
.swr-grupo .aside,.swr-grupo .panel
{
margin-left: 0px!important;
animation-name: none!important;
}

.swr-grupo .panel > .room > .msgs > li > div > .msg > i > span.audioplay > span.seek
{
min-width: 130px;
}
}

@media (max-width:400px)
{
.emojionearea .emojionearea-picker
{
width: 100%;
}

.emojionearea .emojionearea-picker .emojionearea-filters
{
overflow: scroll;
}

.emojionearea .emojionearea-picker .emojionearea-wrapper
{
width: 100%;
}
}

@media (max-width:1000px)
{
.swr-grupo > .window
{
padding: 0px;
}
}

@media (max-width:767.98px)
{
.swr-grupo > .window
{
padding: 0px;
}

.swr-grupo .msgopt > i,.swr-grupo .opt > i,.nomob
{
display: none;
}

body
{
overflow: hidden;
background: none;
}

.bwmob
{
position: absolute!important;
width: 100%;
height: 100%!important;
}

.abmob
{
position: relative!important;
z-index: 10!important;
}

.swr-grupo .panel,.swr-grupo .aside
{
border: 0px;
}

.swr-grupo .aside
{
border-radius: 0px;
}

.swr-grupo .aside > .head,.swr-grupo .panel > .head,.swr-grupo .rside > .top
{
background: linear-gradient(to right,#E91E63,#9C27B0);
border: 0px;
}

.swr-grupo .aside > .head > .logo
{
-webkit-text-fill-color: white;
}

.swr-grupo .panel > .head > .left > span > span > .typing,.swr-grupo .aside > .head i,.swr-grupo .panel > .head > .left > span > span,.swr-grupo .panel > .head > .left > span > span > span,.swr-grupo .panel > .head,.swr-grupo .rside > .top,.swr-grupo .rside > .top > .left > span > span,.swr-grupo .rside > .top > .right > i,.swr-grupo .rside > .top > .left > span > span > span
{
color: white;
}

.swr-grupo .aside > .search
{
background: black;
border: 0px;
}

.swr-grupo .aside > .search > i
{
color: white;
padding-left: 30px;
}

.swr-grupo .aside > .search > input
{
background: transparent;
border: 0px;
color: WHITE;
padding-left: 35px;
}

.grupo-video > div > div
{
width: 90%;
height: 60%;
}
}

@-webkit-keyframes pulse
{
0%
{
-webkit-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.4);
}

70%
{
-webkit-box-shadow: 0 0 0 10px rgba(204,169,44, 0);
}

100%
{
-webkit-box-shadow: 0 0 0 0 rgba(204,169,44, 0);
}
}

@keyframes pulse
{
0%
{
-moz-box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.4);
box-shadow: 0 0 0 0 rgba(0, 0, 0, 0.4);
}

70%
{
-moz-box-shadow: 0 0 0 10px rgba(204,169,44, 0);
box-shadow: 0 0 0 10px rgba(204,169,44, 0);
}

100%
{
-moz-box-shadow: 0 0 0 0 rgba(204,169,44, 0);
box-shadow: 0 0 0 0 rgba(204,169,44, 0);
}
}

.gr-ldone
{
display: inline-block;
position: relative;
width: 80px;
height: 80px;
}

.gr-ldone div
{
position: absolute;
top: 33px;
width: 13px;
height: 13px;
border-radius: 50%;
background: #fff;
animation-timing-function: cubic-bezier(0, 1, 1, 0);
}

.gr-ldone div:nth-child(1)
{
left: 8px;
animation: gr-ldone1 0.6s infinite;
}

.gr-ldone div:nth-child(2)
{
left: 8px;
animation: gr-ldone2 0.6s infinite;
}

.gr-ldone div:nth-child(3)
{
left: 32px;
animation: gr-ldone2 0.6s infinite;
}

.gr-ldone div:nth-child(4)
{
left: 56px;
animation: gr-ldone3 0.6s infinite;
}

@keyframes gr-ldone1
{
0%
{
transform: scale(0);
}

100%
{
transform: scale(1);
}
}

@keyframes gr-ldone3
{
0%
{
transform: scale(1);
}

100%
{
transform: scale(0);
}
}

@keyframes gr-ldone2
{
0%
{
transform: translate(0, 0);
}

100%
{
transform: translate(24px, 0);
}
}

@-webkit-keyframes rotating
{
from
{
-webkit-transform: rotate(0deg);
-o-transform: rotate(0deg);
transform: rotate(0deg);
}

to
{
-webkit-transform: rotate(360deg);
-o-transform: rotate(360deg);
transform: rotate(360deg);
}
}

@keyframes rotating
{
from
{
-ms-transform: rotate(0deg);
-moz-transform: rotate(0deg);
-webkit-transform: rotate(0deg);
-o-transform: rotate(0deg);
transform: rotate(0deg);
}

to
{
-ms-transform: rotate(360deg);
-moz-transform: rotate(360deg);
-webkit-transform: rotate(360deg);
-o-transform: rotate(360deg);
transform: rotate(360deg);
}
}

.rotating
{
-webkit-animation: rotating 1.2s linear infinite;
-moz-animation: rotating 1.2s linear infinite;
-ms-animation: rotating 1.2s linear infinite;
-o-animation: rotating 1.2s linear infinite;
animation: rotating 1.2s linear infinite;
}

.swr-grupo .panel > .textbox > .box > .icon > i:last-child
{
margin-right: 0px;
}

.emojionearea .emojionearea-button>div.emojionearea-button-open
{
width: 28px;
height: 28px;
margin-left: 1px;
}

.emojionearea .emojionearea-button>div.emojionearea-button-close
{
width: 28px;
height: 28px;
margin-left: 1px;
transform: rotate(0deg);
}