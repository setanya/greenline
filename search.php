<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/core/init.php';//подключение всех нужных  файлов
$arResult = [];
$search = $_GET['search'];
if($search != ''){
    $query = "SELECT n.`id`, n.`title`, n.`detail_text`, n.`image`, DATE_FORMAT (n.`date`,'%d.%m.%Y %H.%i') AS news_date, n.`comments_cnt`, c.`title` AS `news_cat` ".
        "FROM `news`n JOIN `category`c ON c.`id`= n.`category_id` WHERE MATCH(`detail_text`) AGAINST(?)";
    $res = getStmtResult($link, $query, [$search]);
    while($arRes = mysqli_fetch_assoc($res)){
        $text = substr($arRes['detail_text'],0, 200);
        $arRes['detail_text']= $text;

        $arResult[] = $arRes;//формируем общий результирующий массив
       //pr($arRes);
    }
}

$page_content = renderTemplate('search',['arResult'=>$arResult]);



$result = renderTemplate('layout',[//ГЛАВНЫЙ ШАБЛОН СТРАНИЦЫ в переменную вставляем функцию шаблон и передаем ей аргумент layout.php и значения
    //'layout'==layout.php это основной слой и в него вставлять будем аргументы
    'content' => $page_content,// передаем html шаблон main.php <?=$content;>передаем кусок вставляемого контента main.php и выборку новостей
    //в<div class="mainbar"> <?=$content; передаем $page_content = renderTemplate("main");
    'title' => 'Поиск по сайту',//$title = 'Главная страница'; ЗАГОЛОВОК СТРАНИЦЫ
    'arCategory' => $arCategory,////передаем массив из базы категории
    'menuActive' => '',//if($menuActive == 'indexStr'):в layout.php тогда стр сделать активной
]);         /*arCategory -список категорий для layout.php (init.php)*/

echo $result;//Выводим на экран окончательный  вид html  страницы