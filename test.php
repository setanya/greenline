<?php
// ob_start();//включаем буферизацию
// echo "hello oke ";

// //$str =  ob_get_contents();//возвращает данные из буфера обмена
// //ob_end_clean();//очищает буфер обмена

// $str = ob_get_clean();//вернет значение ob_get_contents() и очистит ob_end_clean()
?>
echo $str ;//выводит все что в буфере 
1 Сколько записей на страницу выводить 1,2,3,?   LIMIT 1, 1
$res = mysqli_query($link, "SELECT n.`id`, n.`title`, n.`preview_text`, n.`date`, n.`image`, n.`comments_cnt`, c.`title` AS news_cat  FROM `news`n JOIN `category`c ON c.`id`= n.`category_id` LIMIT 1  1");
LIMIT - ограничение выборки 
LIMIT 0 выводит первую запись
LIMIT n, m 
n с какой записи начинать
m сколько выводить
LIMIT n количество строк
OFFSET m 
m - смещение (с какой начинать)
..........LIMIT n OFFSET m
2 Сколько записей всего в таблице
3 сколько всего будет страницу
4 определить текущую страницу (на какой стр, находится пользователь) 
($_GET['page'])  ?page=1 

    пагинация- постраничный вывод данных


    
    


