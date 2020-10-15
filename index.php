<?php 
    require_once 'core/init.php';//подключение всех нужных  файлов
    $title = 'Главная страница'; // передаем новое значение вкладки 

    $res= mysqli_query($link, "SELECT * FROM `category` ORDER BY `title` ASC");//получаем и сортируем  категории из базы
    $arCategory = mysqli_fetch_all($res, MYSQLI_ASSOC);//выбор из базы `category`
    //Получить все строки и вернуть набор результатов в виде ассоциативного массива

    /*echo '<pre>';
    print_r ($arCategory);
    echo '</pre>';*/
    //$ name ===require_once 'templates/layout.php';//подключение основного вида который небудет изменяться
    $page_content = renderTemplate("main");//в переменную  вставляем функцию шаблон и передаем ей аргумент main.php

    $res = renderTemplate('layout',//в переменную вставляем функцию шаблон и передаем ей аргумент layout.php и значения
                            //'layout'==layout.php это основной слой и в него вставлять будем аргументы
                            ['content' => $page_content,// <?=$content;>передаем кусок вставляемого контента main.php
                            //в<div class="mainbar"> <?=$content; передаем $page_content = renderTemplate("main");
                            'title' => 'Главная страница',//$title = 'Главная страница'; 
                            'arCategory' => $arCategory,////передаем выборку из базы категории
                            ]);
    echo $res;
?>


