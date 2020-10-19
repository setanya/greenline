<?php 
    require_once 'core/init.php';//подключение всех нужных  файлов
    
    $title = 'Главная страница'; // передаем новое значение вкладки 
    //function renderTemplate($name, $data=[])
    //на страницу $name=main.php , $data=['arNew'=>$arNews,]
    $page_content = renderTemplate("main",['arNews'=>$arNews,]);//в переменную  вставляем функцию шаблон и передаем ей аргумент main.php 
                                            //'arNew'==$arNew после отработки функции

    $res = renderTemplate('layout',//в переменную вставляем функцию шаблон и передаем ей аргумент layout.php и значения
                            //'layout'==layout.php это основной слой и в него вставлять будем аргументы    
                            ['content' => $page_content,// <?=$content;>передаем кусок вставляемого контента main.php и выборку новостей
                            //в<div class="mainbar"> <?=$content; передаем $page_content = renderTemplate("main");
                            'title' => 'Главная страница',//$title = 'Главная страница'; 
                            'arCategory' => $arCategory,////передаем выборку из базы категории 
                            ]);         /*arCategory -список категорий для layout.php (init.php)*/
    echo $res;//для вывода страницы
?>


