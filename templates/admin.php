<?php
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
	//КОД для проверки совпадения логина и пароля если совпадает тогда переход на страницу админка ------------------
	//  isset-если существует                    trim - удаляем пробелы
	if(isset($_POST['login'], $_POST['password']) && trim($_POST['login'] === 'loginAdmin'
    && $_POST['password'] ==='passAdmin' && ($_POST['password']) === ($_POST['dbl_password']))){
			header('Location:adminka.php');// перенаправление на нужную страницу	
		}else{
			echo '<p style="color:red;"> Неверный логин или пароль </p>';//вывести и ничего не делать
		};
}






?>

<div class="registr">
    <h2>Войти в панель администратора</h2>
	    <form action ="" method="post">
		    <h3>Введите логин:</h3>
			    <input  name ="login"  type="text"/> 
                	<?if(isset($error['login']) && $error['login'] != ''):?>
                        <span style="color:red;"><br><?=$error['login'];?></span>
                  	<?endif;?>
	<br/>
	<h3>Введите пароль:</h3>
			<input  name ="password" type="password" />
                <?if(isset($error['password']) && $error['password'] != ''):?>
                  	<span style="color:red;"><br/><?=$error['password'];?></span>
                <?endif;?>
	<br/>
	<h3>Подтвердите пароль : </h3>
			<input  name ="dbl_password" type="password" /><br/>
				<?if(isset($error['dbl_password']) && $error['dbl_password'] != ''):?>
					<span style="color:red;"><br/><?=$error['dbl_password'];?></span>
		      	<?endif;?> 
    <br/>
		<div class ="forma">
			<input  type ="submit" name ="sub" value= "Войти"/>
		</div>
	</form>
</div>