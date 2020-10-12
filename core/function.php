<?php
/*Подключает шаблон с параметрами
*/ 
function renderTemplate($name, $data=[]){
    $result ="";//подготавливаем результат 
    //проверка существует или нет
    $name = $_SERVER['DOCUMENT_ROOT'] . '/templates/'.$name. '.php';//создаем полный путь из параметров $name
    if(!file_exists($name)){
        return $result;//если файл не найден, возвращаем результат
    }
    ob_start();//включаем буферизацию

    extract($data);// создает переменные из ключей, ключи станут переменнами  ['title'=>'123'] $title='123'
    require_once $name;
    $result = ob_get_clean();//выводим данные из буфера и  значение очищается

    return $result;//возвращается результат
}


?>