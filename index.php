<?php 
    require_once 'core/init.php';//подключение всех нужных  файлов
    /*arCategory -список категорий для layout.php (init.php)*/  
    $title = 'Главная страница'; // передаем новое значение вкладки 

    $res = mysqli_query($link, "SELECT n.`id`, n.`title`, n.`preview_text`, n.`date`, n.`image`, n.`comments_cnt`, c.`title` AS news_cat  FROM `news`n JOIN `category`c ON c.`id`= n.`category_id` LIMIT 0, 2");
    $arNews =  mysqli_fetch_all($res, MYSQLI_ASSOC);

    //pr($arNews);
    


    //$ name ===require_once 'templates/layout.php';//подключение основного вида который небудет изменяться
    $page_content = renderTemplate("main",[
                                   'arNews'=>$arNews, 
                                    ]);//в переменную  вставляем функцию шаблон и передаем ей аргумент main.php

    $res = renderTemplate('layout',//в переменную вставляем функцию шаблон и передаем ей аргумент layout.php и значения
                            //'layout'==layout.php это основной слой и в него вставлять будем аргументы
                            ['content' => $page_content,// <?=$content;>передаем кусок вставляемого контента main.php
                            //в<div class="mainbar"> <?=$content; передаем $page_content = renderTemplate("main");
                            'title' => 'Главная страница',//$title = 'Главная страница'; 
                            'arCategory' => $arCategory,////передаем выборку из базы категории
                            ]);
    echo $res;//для вывода страницы
?>


