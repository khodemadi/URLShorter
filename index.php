<?php
require_once &quotfunctions.php"
require_once &quotfunc.actions.php"
if(!empty($_GET['u']))require_once &quotredirect.php"
?>
<!DOCTYPE html>
<html lang=&quotfa&quot>
<head>
    <meta charset=&quotUTF-8&quot>
    <title>Rapidcode.iR - سورس کد</title>
    <link rel=&quotstylesheet&quot href=&quotstatic/css/main.css&quot>
</head>
 
<body>
    <div class=&quotcontainer&quot>
        <a id=&quotintroduce&quot href=&quothttps://rapidcode.ir&quot target=&quot_blank&quot>رپید کد • کتابخانه مجازی برنامه نویسان</a>
 
        <form =&quotreturn false;&quot>
            <input autofocus pattern=&quothttps:\/\/.*|http:\/\/.*&quot type=&quoturl&quot name=&quoturl-inp&quot id=&quoturl-inp&quot
                placeholder=&quotلینک مورد نظر برای کوتاه شدن&quot><br><br>
            <input type=&quotbutton&quot id=&quotsubmit&quot value=&quotکوتاه کن&quot>
        </form>
 
        <?php if(isset($GLOBALS['is_url_correct']) && !$GLOBALS['is_url_correct']) echo generate_html_message(&quotآدرس مورد نظر در پایگاه داده یافت نشد .&quot , &quotwarning&quot) ?>
        <?php if(!empty($GLOBALS['info_msg'])) echo $GLOBALS['info_msg'] ?>
 
        <div class=&quotshort-link-wrapper&quot>
            <button id=&quotcopy-short-link&quot data-clipboard-target=&quot#short-link-copy&quot>
                <img src=&quotstatic/img/clippy.svg&quot alt=&quotcopy text&quot>
            </button>
            <input id=&quotshort-link-copy&quot type=&quoturl&quot readonly placeholder=&quotshort link goes here (;&quot dir=&quotltr&quot>
        </div>
    </div>
 
    <script src=static/js/lib/clipboard.min.js> 
    <script src=&quotstatic/js/app.js&quot>
</body>
</html>
