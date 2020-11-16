<?php

ob_start();//включаем буферизацию
echo "hello";

$str =  ob_get_contents();//возвращает данные из буфера обмена
echo $str ;
?>
<?php

//создается полнотекстовый индекс( только CHAR. VARCHAR .TEXT
//CREATE FULLTEXT INDEX `f_text_index` ON `table_name` (`preview_text`, `detail_text`);
//CREATE FULLTEXT INDEX <название индекса> ON имя таблицы(<поле 1>, <поле 2>, .....)
/*
                 1. скорость
                 2. гибкость поиск фразы
                3 .  релевантность - соответствие найденой информации  ожиданием поиска
                    самые популярные , часто встречающие
SELECT * FROM `news` WHERE MATCH (`detail_text`) AGAINST('крыжовник')
SELECT * FROM `таблица ` WHERE MATCH (`поле `) AGAINST('текст поиска')
MATCH - где ищем
AGAINST что ищем
SELECT `id` , `detail_text`, MATCH(`detail_text`) AGAINST('код') AS score  FROM `news` WHERE MATCH (`detail_text`) AGAINST('крыжовник код')
получение  значений релевантности

SELECT `id` , `detail_text` FROM `news` WHERE MATCH (`detail_text`) AGAINST('крыжовник +код' IN BOOLEAN MODE)
 IN BOOLEAN MODE  поиск начал работать для точного поиска
SELECT n.`id`, n.`title`, n.`detail_text`, DATE_FORMAT (n.`date`,'%d.%m.%Y %H.%i') AS news_date, n.`image`, n.`comments_cnt`, c.`title` AS `news_cat` FROM `news`n JOIN `category`c ON c.`id`= n.`category_id` WHERE MATCH (`detail_text`) AGAINST('код')




*/
?>