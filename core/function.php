<?php
/*//функция для Подключает шаблон с параметрами*/

function renderTemplate($name, $data=[]){
    $result ="";//подготавливаем результат 
    //проверка существует или нет
    $name = $_SERVER['DOCUMENT_ROOT'] . '/templates/'.$name. '.php';//создаем полный путь из параметров $name
        if(!file_exists($name)){//file_exists -- Проверить наличие указанного файла или каталога
            return $result;//если файл не найден, возвращаем результат
        }
    ob_start();//включаем буферизацию

    extract($data);// создает переменные из ключей, ключи станут переменнами  ['title'=>'123'] $title='123'
    require_once $name;
    $result = ob_get_clean();//выводим данные из буфера и  значение очищается

    return $result;//возвращается результат
}
//функция для форматированного вывода массива
function pr($arr){
    echo '<pre>';
    print_r ($arr);
    echo '</pre>';
}
// функция для  добавления параметров в адресную строку
function  setPageParam($param, $value){
    $qParam = $_SERVER['QUERY_STRING'];//получаем строку с параметрами purs URL
    parse_str($qParam, $arr);//разбирает $qParam строку в массив $arr Генерируем массив из строки
    if(!empty($param) && !empty($value)){//если передан параметр проверяем ключ  значение

            $arr[$param] = $value;//дописываем в строку
    }
    return http_build_query($arr);//генерирует строку с гет параметрами
}
///// if(!empty($param) && !empty($value)){//если передан параметр проверяем ключ  значение
///      if(array_key_exists($param, $arr)){// проверяет если есть ключ в массиве
//            $arr[$param] = $value;//меняю значение в полученном массиве
//        }else{
//            $arr[$param] = $value;//дописываем в строку
//        }
//}
function getWeekday($a){
    $days = array('Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота' );
    //$days    [0]=>'Воскресенье'
    // [номер дня недели: с 0 до 6]    0 - воскресенье, 6 - суббота
    $num_day = $a;//в переменную передаем аргумент число которое станет ключом массива

    return $days[$num_day];//возвращает название дня недели
}
// пример использования

/**функция для подготовленного запрса
 * @param $link
 * @param $query
 * @param array $param
 * @return false|mysqli_result
 */
//функция для подготовленного запрса=> getStmtResult($link,"SELECT * FROM `tags` WHERE `news_id` = ? ",[$id]);
function getStmtResult($link, $query, $param = [])
{
    $stmt = mysqli_prepare($link, $query);//подготавливает запрос возвращает указатель
    if(!empty($param)){//если пришли параметры в массиве
        $typ = '';//создаем пер, пустую и будем дописывать аргумент с типами данных
        foreach ($param as $item){//циклом заполняем
            if(is_int($item)){//если число $item
                $typ .= 'i';//.дописываем 'i' в конец строки
            }elseif (is_string($item)){//если строка
                $typ .= 's';//.дописываем 's' в конец строки
            }elseif (is_double($item)){//если число  1,3
                $typ .= 'd';//.дописываем 'd' в конец строки
            }else{
                $typ .= 's';//.дописываем 's' в конец строки
            }
        }
        $values = array_merge([$stmt, $typ],$param);//подготавливаем массив параметров для  mysqli_stmt_bind_param($stmr, "s", $title);
        $func = 'mysqli_stmt_bind_param';
        $func(...$values);//... указывает для передачи неопределённого кол-ва аргументов
        mysqli_stmt_execute($stmt);//выполняет подготовленный запрос
        $result = mysqli_stmt_get_result($stmt);// результат запроса  возвращает результат
        return $result;//вернуть значение
        }else {
        $result = mysqli_query($link, $query);
        return $result ;
    }
}




