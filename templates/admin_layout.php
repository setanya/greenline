<!DOCTYPE html>
<html>
<head>
<title><?=$title;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/radius.js"></script>
<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<!-- START PAGE SOURCE -->
<div class="main">
    <div class="header">
        <div class="header_resize">
            <div class="menu_nav">
                <ul>
                    <li <?if($menuActive == 'indexStr'):?>class = "active"<?endif;?>><a href="/">Главная </a></li>

                </ul>
            </div>
            <div class="logo">
                <h1><a href="/">Green<span>Line</span></a> <small>put your slogan here</small></h1>
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <div class="content">
        <div class="content_resize">
            <div class="mainbar">
                <?=$content;?>

            </div>

            <div class="clr"></div>
        </div>
    </div>
    <div class="fbg">
        <div class="fbg_resize">
            <div class="col c1">
                <h2><span>Фото</span></h2>
                <a href="#"><img src="images/pix1.jpg" width="58" height="58" alt="" /></a>
                <a href="#"><img src="images/pix2.jpg" width="58" height="58" alt="" /></a>
                <a href="#"><img src="images/pix3.jpg" width="58" height="58" alt="" /></a>
                <a href="#"><img src="images/pix4.jpg" width="58" height="58" alt="" /></a>
                <a href="#"><img src="images/pix5.jpg" width="58" height="58" alt="" /></a>
                <a href="#"><img src="images/pix6.jpg" width="58" height="58" alt="" /></a>
            </div>
            <div class="col c2">
                <h2><span>Подписка на новости</span></h2>
                <p>Будь в курсе!<br />
                    На сайте представлена подборка самых свежих новостей науки, медицины, современных технологий и многого другого. Вы можете подписаться на нашу рассылку, чтобы всегда быть в курсе.</p>
                <div>
                    <form class="subscribe"  method="post" action="#">
                        <input id ="sub_email" type="text" name="email" placeholder="Ваш email" />
                        <input id ="sent_sub" class="button" type="button" name="email_button" value="Подписаться" />
                    </form>
                    <div class="error_email"></div>
                </div>
            </div>
            <div class="col c3">
                <h2><span>Контакты</span></h2>
                <p>Мы будем рады ответить на любые вопросы.</p>
                <p><a href="#"><?=SITE_EMAIL;?></a></p><?//вывели глобальную переменную с мылом?>
                <p><?=SITE_TELEPHONE_1;?><br /><?//вывели глобальную переменную с телефоном?>
                    <?=SITE_TELEPHONE2;?></p>
                <p><?=SITE_ADDRESS;?></p><?//вывели глобальную переменную с адресом //глобальные переменные в конфиге лежат?>
            </div>
            <div class="clr"></div>
        </div>
    </div>
    <div class="footer">
        <div class="footer_resize">
            <p class="lf">Copyright &copy; <?=date(Y);?> <a href="#">SiteName</a> - All Rights Reserved</p><?//вывели текущий год=date(Y);?>
            <p class="rf"><a href="/">Free CSS Templates</a></p>
            <div class="clr"></div>
        </div>
    </div>
</div>
<!-- END PAGE SOURCE -->
</body>
</html>