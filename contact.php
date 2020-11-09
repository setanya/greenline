<?php
require_once 'core/init.php';//подключение всех нужных  файлов

$title = 'Контакт'; // передаем новое значение вкладки
if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['message'])){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $message = htmlspecialchars($_POST['message']);

   $to = 's3759922110@gmail.com';
   $subject = 'Письмо из формы обратной связи';
   $text = '';
   $text .= 'Имя:'. $name . PHP_EOL;
   $text .= 'Email:'. $email . PHP_EOL;
   $text .= 'Телефон:'. $phone . PHP_EOL;
   $text .= 'Сообщение:'. $message . PHP_EOL;

}

$page_content = renderTemplate("contact");//$name = $_SERVER['DOCUMENT_ROOT'] . '/templates/'.$name. '.php';//создаем полный путь из параметров $name

$rezult = renderTemplate('layout', [
                            'content' => $page_content,//about.php
                            'title' => $title,//
                            'arCategory' => $arCategory,
    'menuActive'=> 'contact',
                        ]);
echo $rezult;//для вывода страницы
//1 создать форму добавления новости разместить в темплейтс
//2 принять данные из формы в корневой папке ,проверить на заполнение
//3 записать новость в базу данных
//4 дату текущюю
//5 проверить скюл айди проверить если добавилась вывести соответствующее сообщение

?>


