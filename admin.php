<?php
require_once  'core/init.php';//подключение всех нужных  файлов

$title = 'Администратор'; // передаем новое значение вк
    if (isset($_POST['sub']) && $_POST['sub'] != ''){//если переменная с name ="sub" существует

        $error = array();//создали переменную с массивом и передастся на стр.
        if($_POST['login'] =='')//если переменная пустая
        {//тогда в переменную $error запишется 'Заполните логин'
            $error['login'] = 'Заполните логин';
        }
        //если пришли данные они запишутся в переменную $error
        if($_POST['password'] ==''){//если переменная пустая
            $error['password'] = 'Заполните пароль';
        }
        if($_POST['dbl_password'] ==''){//если переменная пустая
            $error['dbl_password'] = 'Заполните повтор пароля';
        }
        if($_POST['password'] !== $_POST['dbl_password']){//если пароль не равен подтверждению
            $error['dbl_password'] = 'пароль не совпадает';
        }
        //КОД для проверки совпадает логин и пароль если совпадает тогда переход на страницу админка ------------------
        //  isset-если существует                    trim - удаляем пробелы
        if(isset($_POST['login'], $_POST['password'])){//если пришли данные
            $logim = trim($_POST['login']);//обработали от пробелов
            $pass = trim($_POST['password']);//обработали от пробелов
            $dbl_pass = trim($_POST['dbl_password']);//обработали от пробелов
            if($logim === 'loginAdmin' && $pass ==='passAdmin' && $pass === $dbl_pass ){
                $_SESSION['is_admin'] == '1';
                header('Location:adminka.php');// перенаправление на нужную страницу
            }else{//если не пришли данные
                echo '<p style="color:red;"> Неверный логин или пароль </p>';//вывести и ничего не делать
            }
        }
    }

                                    //$data=['title'=>'123']становится на странице $title='123'
//     function renderTemplate($name, $data=['аргумент'=>$переменной])('аргумент' становится на странице $аргумент)['title'=>'123'] $title='123'
$page_content = renderTemplate("admin",[

                                            ]);//$name = $_SERVER['DOCUMENT_ROOT'] . '/templates/'.$name. '.php';/=>support.php /создаем полный путь из параметров $name
                            //передаем подключение куска страницы  support.php и массив из базы                                           
$rezult = renderTemplate('layout', [
                            'content' => $page_content,//about.php
                            'title' => $title,//название страницы

                            'menuActive' => 'index',
                            //'menuActive' => 'admin',//для активности кнопки
                        ]);
echo $rezult;//для вывода страницы
