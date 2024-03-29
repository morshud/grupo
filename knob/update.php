<?php if(!defined('s7V9pz')) {die();}?><?php
fc('grupo');
grupofns();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Grupo Upgrade - BaeVox Powered</title>
    <meta name="description" content="Grupo Chatrooms">
    <meta name="author" content="BaeVox">
    <meta name="generator" content="Grupo - Powered by BaeVox">
    <link rel="shortcut icon" type="image/png" href="<?php pr(mf("grupo/global/favicon.png")); ?>" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,700,700i,800" rel="stylesheet">
    <?php
    css("riches/kit/bootstrap/bootstrap.min");
    css("riches/fonts/montserrat/font");
    css("riches/fonts/grupo/css/icons");
    css("ajx");
    css("gr-sign");
    ?>
</head>
<body class="sign two bgtwo install">
    <section>
        <div>
            <div>
                <div class='box'>
                    <div class="logo">
                        <img src="<?php pr(mf("grupo/global/grupo.png")); ?>" />
                    </div>
                    <form autocomplete='off' class='gr_install upgrade'>
                        <div class="elements">
                            <input type="hidden" name="act" value=1 />
                            <input type="hidden" name="do" class='doz' value='update' />
                            <div class='stepone'>
                                <label><i class="gi-doc-text"></i>
                                    <input type="text" autocomplete='off' class='license' name="encde" placeholder="CodeCanyon Purchase Code" />
                                </label>
                            </div>
                        </div>
                        <div class="regsep"></div>
                        <div class="submitbtns">
                            <span class="submit global update" form='.gr_install' url='<?php pr(url()); ?>update/'>Upgrade</span>
                        </div>
                        <div class="switch">
                            <i>Stuck at Somewhere?</i>
                            <span class='say' say='Please send an e-mail to hello@baevox.com' sec='8000'><a href="mailto:hello@baevox.com">Contact Us</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

<?php
js("riches/kit/jquery/jquery-3.4.1.min");
js("riches/kit/jquery/jquery-migrate-1.4.1.min");
js("riches/kit/popper/umd/popper.min");
js("riches/kit/bootstrap/bootstrap.min");
js("riches/kit/nicescroll/jquery.nicescroll.min");
js("riches/kit/jscookie/js.cookie");
js('ajx', 'gr-install');
?>
</html>