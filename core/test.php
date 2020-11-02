<?php

ob_start();//включаем буферизацию
echo "hello";

$str =  ob_get_contents();//возвращает данные из буфера обмена
echo $str ;
?>