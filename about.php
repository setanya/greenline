<?php
require_once 'core/init.php';//подключение всех нужных  файлов

$title = 'О нас'; // передаем новое значение вкладки 

$page_content = renderTemplate("about");//$name = $_SERVER['DOCUMENT_ROOT'] . '/templates/'.$name. '.php';//создаем полный путь из параметров $name

$rezult = renderTemplate('layout', [
                            'content' => $page_content,//about.php
                            'title' => $title,//
                            'arCategory' => $arCategory,
                            'menuActive'=> 'about',
                        ]);
echo $rezult;//для вывода страницы

?>