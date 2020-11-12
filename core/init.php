<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'].'/config/config.php';//подключаем настройки
require_once $_SERVER['DOCUMENT_ROOT'].'/config/db.php';//подключаем базу данных
require_once $_SERVER['DOCUMENT_ROOT'].'/core/function.php';//подключаем файл с функциями
//$_SERVER['DOCUMENT_ROOT']=>содержит путь к корневой директории сервера )
//'/config/config.php'=> присоед  через точку путь из папки сайта


//подключение категорий 
    $res= mysqli_query($link, "SELECT * FROM `category` ORDER BY `title` ASC");//получаем и сортируем  категории из базы
    $arCategory = mysqli_fetch_all($res, MYSQLI_ASSOC);//выбор из базы `category`
    //Получить все строки и вернуть набор результатов в виде ассоциативного массива


// //подключение к базе данных для main.php главной страницы(выборка id, title, preview_text, date, image )
//     $res = mysqli_query($link, "SELECT n.`id`, n.`title`, n.`preview_text`, n.`date`, n.`image`, n.`comments_cnt`, c.`title` AS `news_cat` FROM `news`n JOIN `category`c ON c.`id`= n.`category_id` LIMIT 0,4");  
//     $arNews = mysqli_fetch_all($res, MYSQLI_ASSOC);

//подключение к базе данных для support.php
// $ress= mysqli_query($link, "SELECT s.`title`, s.`text` FROM `support`s  WHERE id>0 LIMIT 2, 3");//получаем из базы
// $arSupport = mysqli_fetch_all($ress, MYSQLI_ASSOC);
// pr($arSupport);//проверили приходитли массив
    

?>