<?php 
require_once 'core/init.php';//подключение всех нужных  файлов
//echo(pr($arSupport));
$title = 'Тестовая страница'; // передаем новое значение вкладки 
echo 'ok';
# получает день недели по-русски




$page_content = renderTemplate("testindex",['arSUPPORT'=>$arSupport, 'test'=>$arCategory]);
//$name = $_SERVER['DOCUMENT_ROOT'] . '/templates/'.$name. '.php';//создаем полный путь из параметров $name



$rezult = renderTemplate('layout', [
                                    'content' => $page_content,//about.php
                                    'title' => $title,//
                                    'arCategory' => $arCategory,
                        ]);
echo $rezult;//для вывода страницы

?>