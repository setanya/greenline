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





?>