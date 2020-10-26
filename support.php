<?php
require_once 'core/init.php';//подключение всех нужных  файлов

$title = 'Поддержка'; // передаем новое значение вк

// 1) сколько выводить новостей на страницы
    $numb = 2;
// 2) сколько записей в базе
    $resSupport = mysqli_query($link, "SELECT * FROM `support`");//сделали выборку из базы
    $colSupport =  mysqli_num_rows($resSupport);//mysqli_num_rows => посчитали
// 3)   кол-во страниц определим сколько надо
    $colSTR = ceil($colSupport/$numb);
    pr($colSTR);//проверили приходитли массив
// 4) Получаем номер страницы из адресной строки, intval-приводит к числу
    $pages = intval($_GET['page']);
// 5) какую страницу нужно вывести
    if($pages <=0){//если номер стр. не существует или отрицательное
        $pages = 1;//показываем  первую страницу
    }elseif($pages > $colSTR){//если номер стр. больше чем их кол-во стр.
        $pages = $colSTR;// показываем последнюю страницу если номер стр. больше чем их кол-во
    }
// 6) с какой новости начинать Вычисляем начиная к какого номера следует выводить сообщения
//              номер стр/ из адресной строки * кол-во новостей на стр. - кол-во новостей на стр.
    $startStr = $pages * $numb - $numb;//$page=0 * $numb = 2 -$numb = 2
// 7) массив от 1 до КОЛИЧЕСТВО СТРАНИЦ
    $arСolStr = range(1, $colSTR);//range( от 1 до $кол-во страниц)
    //pr($arСolStr);

$ress= mysqli_query($link, "SELECT s.`title`, s.`text` FROM `support`s WHERE id>0 LIMIT $startStr, $numb ");//получаем из базыWHERE id>0 LIMIT 0, 3
$arSupport = mysqli_fetch_all($ress, MYSQLI_ASSOC);//массив с новостями

                                    //$data=['title'=>'123']становится на странице $title='123'
//     function renderTemplate($name, $data=['аргумент'=>$переменной])('аргумент' становится на странице $аргумент)['title'=>'123'] $title='123'
$page_content = renderTemplate("support",['arsupports'=>$arSupport,//массив с новостями
                                        'arstr'=> $arСolStr,//передаем массив со страницами
                                        'quantityStr' => $colSTR,//КОЛИЧЕСТВО СТРАНИЦ 
                                        'numStr' =>$pages,//передаем текущюю страницу

                                ]);//$name = $_SERVER['DOCUMENT_ROOT'] . '/templates/'.$name. '.php';/=>support.php /создаем полный путь из параметров $name
                            //передаем подключение куска страницы  support.php и массив из базы 
                            
                            
$rezult = renderTemplate('layout', [
                            'content' => $page_content,//about.php
                            'title' => $title,//
                            'arCategory' => $arCategory,
                            'menuActive' =>'support',//для активности кнопки названия
                        ]);
echo $rezult;//для вывода страницы
