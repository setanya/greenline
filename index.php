<?php 
require_once 'core/init.php';//подключение всех нужных  файлов
$title = 'Главная страница'; 

$res= mysqli_query($link, "SELECT * FROM `category` ORDER BY `title` ASC");
$arCategory = mysqli_fetch_all($res, MYSQLI_ASSOC);//выбор из базы `category`

/*echo '<pre>';
print_r ($arCategory);
echo '</pre>';*/
//$ name ===require_once 'templates/layout.php';//подключение основного вида который небудет изменяться
$page_content = renderTemplate("main");
$res = renderTemplate('layout',
                        ['content' => $page_content,
                        'title' => 'Главная страница',
                        'arCategory' => $arCategory,
                        ]);
echo $res;
?>


