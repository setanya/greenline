<?php
// ob_start();//включаем буферизацию
// echo "hello oke ";

// //$str =  ob_get_contents();//возвращает данные из буфера обмена
// //ob_end_clean();//очищает буфер обмена

// $str = ob_get_clean();//вернет значение ob_get_contents() и очистит ob_end_clean()
?>
<?//echo $str ;//выводит все что в буфере 
// 1 Сколько записей на страницу выводить 1,2,3,?   LIMIT 1, 1
// $res = mysqli_query($link, "SELECT n.`id`, n.`title`, n.`preview_text`, n.`date`, n.`image`, n.`comments_cnt`, c.`title` AS news_cat  FROM `news`n JOIN `category`c ON c.`id`= n.`category_id` LIMIT 1  1");
// LIMIT - ограничение выборки 
// LIMIT 0 выводит первую запись
// LIMIT n, m 
// n с какой записи начинать
// m сколько выводить
// LIMIT n количество строк
// OFFSET m 
// m - смещение (с какой начинать)
// ..........LIMIT n OFFSET m
// 2 Сколько записей всего в таблице
// 3 сколько всего будет страницу
// 4 определить текущую страницу (на какой стр, находится пользователь) 
// ($_GET['page'])  ?page=1 

//     пагинация- постраничный вывод данных
//
//1 ) получить текущую стр
//2) получить последнюю стр
//3) получить 2 предыдущие стр
//4) получить 2 следующие  стр
////////////////////////////
///////алгоритм получения фильтра  категорий/////////////
//1)
//2)Сформировать ссылки с правильными параметрами параметрами(лояут )<?$category['id'];?><!-- -->
<!--<a href="?category=--><?//$category['id'];?><!--">--><?//=$category['title'];?><!--</a>-->
<!--в адресную строку передаем № ['id'] равную нажатой категории-->
<!--3) проверяем наличие параметров в массиве $_GET -->
<!---->
<!--4) если пераметры пришли добавить фильтрацию условия в запрос на выборку новостей -->
<!---->
<!--// подготовленные запросы//////////////////////////////////-->
<!--1, формируем запрос с плейсхолдерами ?-->
<!--2, отправить запрос в базу-->
<!--3,  подставить значения в подготовленное выражение-->
<!--4,  выполнить подготовленное выражение-->
<!--5,  обработать результат выполнения -->



<?php //if(!empty($arPage)):?>
<!---->
<!--<p class="pages">-->
<!--    <small>Страница --><?//=$curPage;?><!-- из --><?//=$totalPage;?><!--</small>--><?////вывели переменные?>
<!---->
<!--    --><?//foreach($arPage as $nPage):?><!----><?////перебираем страницы?>
<!---->
<!--        --><?//if($curPage == $nPage):?><!----><?////если текущая страница?>
<!--            <span>--><?//=$nPage;?><!--</span>--><?////текущая страница?>
<!--        --><?//else:?>
<!--            <a href="?page=--><?//=$nPage;?><!--">--><?//=$nPage;?><!--</a> --><?////формируем ссылки на страницы?>
<!--        --><?php //endif;?><!--  -->
<!--        -->
<!--    --><?//endforeach;?>
<!--            <a href="?page=--><?//=$totalPage;?><!--">&raquo;</a>-->
<!--</p>-->
<?php //endif;?>
<?php
//i  integer  (число)
//s  string   (строка)
//d  double    (1.3 число с плавающей точкой)
//b  blob      (бинарные данные)

    require_once 'core/init.php';
//    $cat = $_GET['category'];// $id получаем данные из адресной строки
//    $title = 'медицина';

//    $stmr = mysqli_prepare($link, "SELECT * FROM `category` WHERE `title` = ?");//подготавливает запрос возвращает указатель
//     //mysqli_stmt_bind_param  привязывает переменные к параметрам запроса
//    mysqli_stmt_bind_param($stmr, "s", $title);
//    //mysqli_stmt_execute  выполняет подготовленный запрос
//    mysqli_stmt_execute($stmr);
//    // обработать результат запроса  возвращает результат
//        $res = mysqli_stmt_get_result($stmr);

//$res = getStmtResult($link, "SELECT * FROM `category`");
//
//        while($arRes = mysqli_fetch_assoc($res)){//записываем переменную  построчно массивом
//            pr($arRes);
//        };
//форма для загрузки файлов
pr($_FILES);
//    if($_FILES['user_file']['error']== 0){//если ошибок нет
//        $upload = $_SERVER['DOCUMENT_ROOT'].'/upload/';//путь к папке где будут лежать загруженные файлы
//        $arrName = explode('.',$_FILES['user_file']['name']);//разбиваем имя файла  по точке чтобы вставить метку времени
//        $name = $arrName[0].'_'.time().'.'.$arrName[1];//составляем новое имя для файла с меткой времени
//        //move_uploaded_file($_FILES['user_file']['tmp_name'],$upload.$_FILES['user_file']['name']);
//        move_uploaded_file($_FILES['user_file']['tmp_name'],$upload.$name);
//    }
if(!empty($_FILES['user_file']['error'] )){//если файлы пришли и не пусты
    foreach ($_FILES['user_file']['error'] as $k =>$val){//перебираем циклом поле эрор
        if($val == 0){//если значение = нулю
            $upload = $_SERVER['DOCUMENT_ROOT'].'/upload/';//путь куда положить файлы
            $arrName = explode('.',$_FILES['user_file']['name'][$k]);
            $name = $arrName[0].'_'.time().'.'.$arrName[1];
            move_uploaded_file($_FILES['user_file']['tmp_name'][$k],$upload.$name);
        }
    }
}

?>
<?php//форма для загрузки файлов?>

<form method="post" enctype="multipart/form-data">

    <input type="file" name="user_file[]"/><br>
    <input type="file" name="user_file[]"/><br>
    <input type="file" name="user_file[]"/><br>
    <input type="file" name="user_file[]"/><br>
    <input type="submit" value="Загрузить"/>
</form>


























