<?php
$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_BASE);//подключение к БД через константы
if(!$link){//если нет подкючения
    echo  "Прoизошла ошибка" . PHP_EOL;//надпись ошибка
    echo 'Код ошибки'. mysqli_connect_errno().PHP_EOL;//выведет код ошибки
    echo 'Текст ошибки'. mysqli_connect_error();// текст ошибки
    die();//убивается соединение с базой
}
mysqli_set_charset($link, "utf8");// подключает русский язык