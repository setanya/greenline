<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/core/init.php';//подключение всех нужных  файлов
//print_r($_POST);
//для правильности заполнения
//$resTr = getStmtResult($link, "START_TRANSACTION");//запуск трансзакции
mysqli_begin_transaction($link);

$resC = getStmtResult($link, "INSERT INTO `comments` SET `text`= ? , `author`= ?, `news_id`=? , `date`=NOW()",[
    $_POST['message'],
    $_POST['name'],
    $_POST['news_id'],

]);

$id = mysqli_insert_id($link);//получает  id только что вставленной записи




//счетчик новостей
$resN = getStmtResult($link, "SELECT `comments_cnt` FROM `news` WHERE `id`=?", [$_POST['news_id']]);
$cnt = mysqli_fetch_assoc($resN)['comments_cnt'];
$cnt++;
//обновляем данные
$resNews = getStmtResult($link, "UPDATE `news` SET `comments_cnt` =? WHERE `id`=?", [$cnt, $_POST['news_id']]);


//если в базу пришли данные и запущена трансзакции запомнила  если
//if($resC == true && $resNews ==true){
if($id > 0){//если id полученой новости больше 0
    //getStmtResult($link, "COMMIT");//все обрабатывается  и записывается если true
    mysqli_commit($link);
    //echo 'ok';
    //выводим кусок кода получаем  комментарии
    $resComment = getStmtResult($link, "SELECT * FROM `comments` WHERE `news_id` = ? ",[$_POST['news_id']]);//запросAND  `active`= ? [$_POST['news_id'], 1])
    $arComments = mysqli_fetch_all($resComment, MYSQLI_ASSOC);//получаем комментарии текущей новости

    $comments = renderTemplate('comments',[//получаем шаблон комментариев comments.php
        'arComments' =>$arComments,//передаем массив в шаблон коментария
    ]);
    $arResult = [];//создали массив
    $arResult['comments'] = $comments;//получили массив $comments
    $arResult['cc'] = count($arComments);// посчитали массив комментариев
    echo json_encode($arResult);//превращаем массив в джейсон


}else{// если false
    //getStmtResult($link, "ROLLBACK");//откатить сбросит запрос базы данных тип таблиц INNOR DB
    mysqli_rollback($link);
    echo 'error';

}