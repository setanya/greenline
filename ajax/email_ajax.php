<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/core/init.php';//подключение всех нужных  файл

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';


//$resEmail = getStmtResult($link, "SELECT * FROM `subscribe` WHERE `email` = ? ",[$_POST['email']]);
//$cntE = mysqli_fetch_assoc($resEmail);
//echo $cntE;
$idM = mysqli_insert_id($link);//mysqli_insert_id => получает  id только что вставленной записи
if($_POST['email'] != ''){
    //ответ аякса  дописать в таблицу *subscribe* в поле /email/ данные которые придут  из $_POST['email'],
    $resM = getStmtResult($link, "INSERT INTO `subscribe` SET `email`= ?", [$_POST['email']]);

    echo "Вы подписаны";
}else{
    echo "<p>Вы не ввели ничего</p>";
}