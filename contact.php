<?php
require_once 'core/init.php';//подключение всех нужных  файлов

$title = 'Контакт'; // передаем новое значение вкладки 

$page_content = renderTemplate("contact");//$name = $_SERVER['DOCUMENT_ROOT'] . '/templates/'.$name. '.php';//создаем полный путь из параметров $name

$rezult = renderTemplate('layout', [
                            'content' => $page_content,//about.php
                            'title' => $title,//
                            'arCategory' => $arCategory,
                        ]);
echo $rezult;//для вывода страницы

?>
