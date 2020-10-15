<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/config/config.php';//подключаем настройки
//$_SERVER['DOCUMENT_ROOT']=>содержит путь к корневой директории сервера )
//'/config/config.php'=> присоед  через точку путь из папки сайта
require_once $_SERVER['DOCUMENT_ROOT'].'/config/db.php';//подключаем базу данных
require_once $_SERVER['DOCUMENT_ROOT'].'/core/function.php';//подключаем файл с функциями



//подключение категорий 
    $res= mysqli_query($link, "SELECT * FROM `category` ORDER BY `title` ASC");//получаем и сортируем  категории из базы
    $arCategory = mysqli_fetch_all($res, MYSQLI_ASSOC);//выбор из базы `category`
    //Получить все строки и вернуть набор результатов в виде ассоциативного массива



?>