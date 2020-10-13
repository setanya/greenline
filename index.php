<<<<<<< HEAD

//Получить все строки и вернуть набор результатов в виде ассоциативного массива
=======
<?php 
require_once 'core/init.php';//подключение всех нужных  файлов
$title = 'Главная страница'; 

$res= mysqli_query($link, "SELECT * FROM `category` ORDER BY `title` ASC");
$arCategory = mysqli_fetch_all($res, MYSQLI_ASSOC);//выбор из базы `category`
>>>>>>> 9cfc0eae9bb9fff57469f631c50cd3bb1f096484

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


