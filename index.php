<?php 
    require_once 'core/init.php';//подключение всех нужных  файлов
    /** $link -ресурс запроса*/
    $title = 'Главная страница'; // передаем новое значение вкладки 
    //
    $num = 3;// сколько выводить новостей на страницы
    /**фильтрация новостей по категориям */
    $where = '';//есл пусто  то небудет работать условие
    if(isset($_GET['category'])){
        //pr($_GET['category']);//получаем цифру категории
        $category = intval($_GET['category']);//обязательно проверяем что число
        //pr($category);
        if($category > 0){//если число категории больше 0 новости опред. категории
            $where = 'WHERE `category_id`= ?' ; //тогда переменная = `category_id`= № $_GET['category']
        }
    } //pr($where);
//если есть условие и выбрана категория
    if($where != ''){//
        $resTotal = getStmtResult($link,"SELECT * FROM `news`$where", [$category]);
    }else{//если нет параметров
        $resTotal =getStmtResult($link,"SELECT * FROM `news`");
    }

    //$resTotal =mysqli_query($link,"SELECT * FROM `news`  $where");//вывести всё из таблицы `news`где  переменная $where = `category_id`= № $_GET['category']
    $total = mysqli_num_rows($resTotal);//mysqli_num_rows кол-во записей в запросе bd категорий
     //посчитает кол-во страниц нужной категории



    $totalStr= ceil($total / $num);//общее КОЛИЧЕСТВО СТРАНИЦ ceil-округление в большую сторону кол-во стр / на кол-во записей 
    
    $page = intval($_GET['page']);// Получение номера страницы из адресной строки, intval-приводит к числу
    //показывать номер страницы
    if($page <=0){//если номер стр. не существует или отрицательное
        $page = 1;//показываем  первую страницу
    }elseif($page > $totalStr){//если номер стр. больше чем их колличество 
        $page = $totalStr;// показываем последнюю страницу если номер стр. больше чем их кол-во
    }
    // с какой новости начинать 
    $offset = $page * $num - $num;//$page=0 * $num = 2 -$num = 2


    //подключение к базе данных для main.php главной страницы(выборка id, title, preview_text, date, image )                                                                                   //$where = 'WHERE `category_id`= '.$category;
    $query = "SELECT n.`id`, n.`title`, n.`preview_text`, n.`image`, DATE_FORMAT (n.`date`,'%d.%m.%Y %H.%i') AS news_date, n.`comments_cnt`, c.`title` AS `news_cat` ".
        "FROM `news`n JOIN `category`c ON c.`id`= n.`category_id` $where ORDER BY n.`id` LIMIT ?, ?";


    //в зависимости от наличия условий подготавливаем параметры
    if($where != '' && isset($category)){
        $param = [$category, $offset, $num];
    }else{//если пустая выводим с какой новости начинать и номер стр,
        $param = [$offset, $num];
    }
    $res = getStmtResult($link, $query, $param);
    $arNews = mysqli_fetch_all($res, MYSQLI_ASSOC);
    
    $arPage = range(1, $totalStr);//массив от 1 до КОЛИЧЕСТВО СТРАНИЦ ($totalStr)[1,2,3]
    //получить  предыдущие стр
    $prevPage = '';
    if($page > 1){//если текущая стр. больше 1   
        $prevPage  = $page - 1;//то в переменную запишется текущее число -1
    }
    //получить  следующую  стр
    $nextPage = '';
    if($page < $totalStr){////если текущая стр. меньше общего кол-ва стр
        $nextPage = $page + 1;//то в переменную запишется текущее число + 1
    }
    //да или нет показывать навигацию
    $is_nav = ($totalStr >1) ? true : false; //если количество стр больше 1  то true тогда показывать иначе false
    // $is_nav = '';
    // if($totalStr >1){
    //     $is_nav = true;
    // }else{
    //     $is_nav = false;
    // }

    /////////////////////////////////////////////////////////////////////////////////
    $pageNavigation = renderTemplate("navigation", [//получаем html шаблон navigation.php 
                                                //'arPage'=>$arPage,//передаем массив со страницами
                                                'totalPage' => $totalStr,//КОЛИЧЕСТВО СТРАНИЦ ($totalStr)
                                                'curPage' =>$page,//передаем текущюю страницу
                                                'nextPage' => $nextPage,// передаем№  следующие  стр
                                                'prevPage' => $prevPage,//передаем№ предыдущие стр
                                                'show' => $is_nav,// параметр для показа навигации
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
                            'menuActive' => 'indexStr',//if($menuActive == 'indexStr'):в layout.php тогда стр сделать активной
    ]);         /*arCategory -список категорий для layout.php (init.php)*/

    echo $result;//Выводим на экран окончательный  вид html  страницы


?>


