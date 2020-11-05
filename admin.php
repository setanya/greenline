<?php
require_once 'core/init.php';//подключение всех нужных  файлов

$title = 'Администратор'; // передаем новое значение вк

                                    //$data=['title'=>'123']становится на странице $title='123'
//     function renderTemplate($name, $data=['аргумент'=>$переменной])('аргумент' становится на странице $аргумент)['title'=>'123'] $title='123'
$page_content = renderTemplate("admin",[

                                            ]);//$name = $_SERVER['DOCUMENT_ROOT'] . '/templates/'.$name. '.php';/=>support.php /создаем полный путь из параметров $name
                            //передаем подключение куска страницы  support.php и массив из базы                                           
$rezult = renderTemplate('layout', [
                            'content' => $page_content,//about.php
                            'title' => $title,//название страницы
                            'arCategory' => $arCategory,//передали категории
                            'menuActive' => 'admin',//для активности кнопки
                        ]);
echo $rezult;//для вывода страницы