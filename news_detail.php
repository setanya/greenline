<?php
require_once 'core/init.php';//подключение всех нужных  файлов

//echo $_GET['id'];
$id = intval($_GET['id']);//текущая новость
$title = 'Новость';
$query = "SELECT n.`id`, n.`title`, n.`detail_text`, DATE_FORMAT (n.`date`,'%d.%m.%Y %H.%i') AS date_detail, n.`image`, n.`comments_cnt`, c.`title` ".
    "AS `news_cat` FROM `news`n JOIN `category`c ON c.`id`= n.`category_id` WHERE  n.`id`= ? LIMIT ?";
$res = getStmtResult($link, $query, [$id, 1]);
$arNewsDetail = mysqli_fetch_assoc($res);//массив со всеми значениями
//pr($arNewsDetail);
//die();
//получаем  комментарии
$resComment = getStmtResult($link, "SELECT * FROM `comments` WHERE `news_id` = ? ",[$id]);//запросAND  `active`= ?

$arComments = mysqli_fetch_all($resComment, MYSQLI_ASSOC);//получаем комментарии текущей новости

$resTags = getStmtResult($link,"SELECT * FROM `tags` WHERE `news_id` = ? ",[$id]);
$arTags = mysqli_fetch_all($resTags, MYSQLI_ASSOC );//массив со всеми значениями


$comments = renderTemplate('comments',[//получаем шаблон комментариев comments.php
                            'arComments' =>$arComments,//передаем массив в шаблон коментария
]);


$page_content = renderTemplate("news_detail",[//получаем html шаблон news_detail.php
                                'arNews'=>$arNewsDetail,//в переменную  вставляем массив с новостью из базы данных
                                    'comments' => $comments,//передаем готовый html код комментариев
                    'arTags'=>$arTags,//передаем массив с тегами новости
]);

$result = renderTemplate('layout',[//ГЛАВНЫЙ ШАБЛОН СТРАНИЦЫ в переменную вставляем функцию шаблон и передаем ей аргумент layout.php и значения
    //'layout'==layout.php это основной слой и в него вставлять будем аргументы
    'content' => $page_content,// передаем html шаблон main.php <?=$content;>передаем кусок вставляемого контента main.php и выборку новостей
    //в<div class="mainbar"> <?=$content; передаем $page_content = renderTemplate("main");
    'title' => $title,//$title = 'Главная страница'; ЗАГОЛОВОК СТРАНИЦЫ
    'arCategory' => $arCategory,////передаем массив из базы категории
    'menuActive' => 'indexStr',//if($menuActive == 'indexStr'):в layout.php тогда стр сделать активной
]);         /*arCategory -список категорий для layout.php (init.php)*/

echo $result;//Выводим на экран окончательный  вид html  страницы
?>