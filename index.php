<?php 
    require_once 'core/init.php';//подключение всех нужных  файлов
    /** $link -ресурс запроса*/
    $title = 'Главная страница'; // передаем новое значение вкладки 
    $num = 2;// сколько выводить новостей на страницы

    $resTotal =mysqli_query($link,"SELECT * FROM `news`");
    $total = mysqli_num_rows($resTotal);//кол-во записей в запросе bd

    $totalStr= ceil($total / $num);//КОЛИЧЕСТВО СТРАНИЦ ceil-округление в большую сторону кол-во стр / на кол-во записей 
    

    $page = intval($_GET['page']);// Получение номера страницы из адресной строки, intval-приводит к числу
    
    if($page <=0){//если номер стр. не существует или отрицательное
        $page = 1;//показываем  первую страницу
    }elseif($page > $totalStr){//если номер стр. больше чем их колличество 
        $page = $totalStr;// показываем последнюю страницу если номер стр. больше чем их кол-во
    }
    // с какой новости начинать 
    $offset = $page * $num - $num;//$page=0 * $num = 2 -$num = 2
    
    $arPage = range(1, $totalStr);//массив от 1 до КОЛИЧЕСТВО СТРАНИЦ ($totalStr)

    //подключение к базе данных для main.php главной страницы(выборка id, title, preview_text, date, image )
    $res = mysqli_query($link, "SELECT n.`id`, n.`title`, n.`preview_text`, n.`date`, n.`image`, n.`comments_cnt`, c.`title` AS `news_cat` FROM `news`n JOIN `category`c ON c.`id`= n.`category_id` ORDER BY `id` LIMIT $offset, $num");  
    $arNews = mysqli_fetch_all($res, MYSQLI_ASSOC);
    


    /////////////////////////////////////////////////////////////////////////////////
    $pageNavigation = renderTemplate("navigation", [//получаем html шаблон navigation.php 
                                                'arPage'=>$arPage,//передаем массив со страницами
                                                'totalPage' => $totalStr,//КОЛИЧЕСТВО СТРАНИЦ ($totalStr)
                                                'curPage' =>$page,//передаем текущюю страницу
    ]); 
                                //function renderTemplate($name, $data=[])
                                //на страницу $name=main.php , $data=['arNew'=>$arNews,]
    $page_content = renderTemplate("main",[//получаем html шаблон main.php 
                                            'arNews'=>$arNews,//в переменную  вставляем массив с новостями из базы данных
                                                                //'arNew'==$arNew после отработки функции массив из базы
                                                                //$res = mysqli_query($link, "SELECT n.`id`, n.`title`, n.`preview_text`.....);$arNews = mysqli_fetch_all($res, MYSQLI_ASSOC);  
                                            'navigation'=>$pageNavigation,//получаем html шаблон навигации
    ]);


    $result = renderTemplate('layout',[//ГЛАВНЫЙ ШАБЛОН СТРАНИЦЫ в переменную вставляем функцию шаблон и передаем ей аргумент layout.php и значения
                            //'layout'==layout.php это основной слой и в него вставлять будем аргументы   
                            'content' => $page_content,// передаем html шаблон main.php <?=$content;>передаем кусок вставляемого контента main.php и выборку новостей
                            //в<div class="mainbar"> <?=$content; передаем $page_content = renderTemplate("main");
                            'title' => 'Главная страница',//$title = 'Главная страница'; ЗАГОЛОВОК СТРАНИЦЫ
                            'arCategory' => $arCategory,////передаем массив из базы категории 
    ]);         /*arCategory -список категорий для layout.php (init.php)*/

    echo $result;//Выводим на экран окончательный  вид html  страницы


?>


