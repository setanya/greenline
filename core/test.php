<?php

ob_start();//включаем буферизацию
echo "hello";

$str =  ob_get_contents();//возвращает данные из буфера обмена
echo $str ;
?>
<?php

//создается полнотекстовый индекс( только CHAR. VARCHAR .TEXT
//CREATE FULLTEXT INDEX <название индекса> ON (<поле 1>, <поле 2>, .....)
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





*/
?>