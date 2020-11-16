<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/core/init.php';//подключение всех нужных  файлов

$title = 'Администратор'; // передаем новое значение 

    if (isset($_POST['sub']) && $_POST['sub'] != ''){//если переменная с name ="sub" существует

        $error = array();//создали переменную с массивом и передастся на стр.
        if($_POST['login'] ==''){//если переменная пустая
            $error['login'] = 'Заполните логин';//тогда в переменную $error запишется 'Заполните логин'
        }
        if($_POST['password'] ==''){//если переменная пустая
            $error['password'] = 'Заполните пароль';//тогда в переменную $error запишется
        }
        if($_POST['dbl_password'] ==''){//если переменная пустая
            $error['dbl_password'] = 'Заполните повтор пароля';//тогда в переменную $error запишется
        }
        if($_POST['password'] !== $_POST['dbl_password']){//если пароль не равен подтверждению
            $error['dbl_password'] = 'пароль не совпадает';//тогда в переменную $error запишется
        }
        //КОД для проверки совпадает логин и пароль если совпадает тогда переход на страницу админка ------------------
        //  isset-если существует                    trim - удаляем пробелы
            if(isset($_POST['login'], $_POST['password']) && $_POST['login']!= '' && $_POST['password'] != ''){//если пришли данные
                $login = htmlspecialchars(trim($_POST['login'])) ;//обработали от пробелов
                $pass = htmlspecialchars( trim($_POST['password']));//обработали от пробелов
                $dbl_pass = htmlspecialchars( trim($_POST['dbl_password']));//обработали от пробелов
                $log = 'loginAdmin';
                $pas = 'passAdmin';
                if($login !== $log){//если пришедший логин не равен установленному
                    $error['login'] = 'Неверный логин';//в переменную записывается ошибка
                }
                if ($pass  !== $pas){//если не верный пароль
                    $error['password'] = 'Неверный пароль';
                }
                if($dbl_pass !== $pas){//если подтверждение пароля не равно установленному
                    $error['dbl_password'] = 'Неверный пароль';
                }
                if($login === $log && $pass === $pas && $dbl_pass ===  $pas){
                    $_SESSION['admin'] = '5';
                }
            }
    }
//pr($error);//передали вывод ошибок
//проверка для формы отправки файла
//pr($_FILES);
   if($_FILES['user_file']['error']== 0){//если ошибок нет
        $upload = $_SERVER['DOCUMENT_ROOT'].'/upload/';//путь к папке где будут лежать загруженные файлы
        $arrName = explode('.',$_FILES['user_file']['name']);//разбиваем имя файла  по точке чтобы вставить метку времени
        $name = $arrName[0].'_'.time().'.'.$arrName[1];//составляем новое имя для файла с меткой времени
        //move_uploaded_file($_FILES['user_file']['tmp_name'],$upload.$_FILES['user_file']['name']);
        move_uploaded_file($_FILES['user_file']['tmp_name'],$upload.$name);
        //Перемещает загруженный файл в новое место(временное имя , путь к папке где будут лежать загруженные файлы, имя для файла с меткой времени
    }
//запись новостей в базу данных и вывод на страницу
//pr($_POST);
    if(isset($_POST['category']) && isset($_POST['title_news']) && isset($_POST['litle_text']) && isset($_POST['big_text'])
        && $_POST['category'] !='' && $_POST['title_news'] !='' && $_POST['litle_text'] !='' && $_POST['big_text'] !=''){
        $categoryNews = $_POST['category'];
        $titleNews = $_POST['title_news'];
        $litleNews = $_POST['litle_text'];
        $bigNews = $_POST['big_text'];


            getStmtResult($link, "INSERT INTO `news` SET `title`= ?, `preview_text`= ?, `detail_text`=?, `category_id`= ?, `date`= NOW()", [$titleNews, $litleNews, $bigNews, $categoryNews ]);
           echo "Новость добавлена";

}

$page_content = renderTemplate('admin',[//admin.php
                                        'error'=>$error,//в переменную передали вывод ошибок под формой
                                      ]);

$rezult = renderTemplate('admin_layout', [//подключаем файл admin_layout.php
                            'content' => $page_content,//admin.php
                            'title' => $title,//название страницы
                           // 'arCategory' => $arCategory,////передаем массив из базы категории
                            'menuActive' => 'index',
                        ]);
echo $rezult;//для вывода страницы
