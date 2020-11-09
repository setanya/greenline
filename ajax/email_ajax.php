<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/core/init.php';//подключение всех нужных  файл

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';
//ответ аякса  дописать в таблицу *subscribe* в поле /email/ данные которые придут  из $_POST['email'],

//$resEmail = getStmtResult($link, "SELECT * FROM `subscribe` WHERE `email` = ? ",[$_POST['email']]);
//$cntE = mysqli_fetch_assoc($resEmail);
//echo $cntE;
////$idM = mysqli_insert_id($link);//mysqli_insert_id => получает  id только что вставленной записи
//if($_POST['email'] != ''){
//    $resM = getStmtResult($link, "INSERT INTO `subscribe` SET `email`= ?", [$_POST['email']]);
//}else{
//    echo "<p>Вы не ввели ничего</p>";
//}
//pr($_POST);
    if(isset($_POST['email']) && $_POST['email'] !=''){
        $email = $_POST['email'];
           if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $resEmail= getStmtResult($link, "SELECT * FROM `subscribe` WHERE `email` = ? ", [$email]);
                    if(mysqli_num_rows($resEmail)>0){
                        echo 'такой  email есть в базе';
                    }else{
                        getStmtResult($link, "INSERT INTO `subscribe` SET `email`= ?", [$email]);
                        echo "email добавлен";
                    }

            }else{
                echo '<span style="color: chartreuse">заполните поле email правильно </span>';
            }
    }else{
        echo 'заполните поле email';
    }


