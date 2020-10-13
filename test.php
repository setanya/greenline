<?php
ob_start();//включаем буферизацию
echo "hello oke ";

//$str =  ob_get_contents();//возвращает данные из буфера обмена
//ob_end_clean();//очищает буфер обмена

$str = ob_get_clean();//вернет значение ob_get_contents() и очистит ob_end_clean()

echo $str ;//выводит все что в буфере 
?>