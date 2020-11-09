<?php pr($_SESSION)?>
<?php if($_SESSION['is_admin'] == '1'):?>
    <div class="form_admin">
        <form action="" method="post">
            <br>
            Категория новостей
            <select class="category">
                <option>Интернет</option>
                <option>Медицина</option>
                <option>Наука</option>
                <option>Технологии</option>
            </select>
            <br>
            Заголовок новости:<br>
            <input type="text" name="title_news" class="news">
            <br>
            Краткий текст новости:<br>
            <textarea name="litle_text" id="litle_news" cols="60" rows="15"></textarea>
            <br>
            Продолжение текста новости:<br>
            <textarea name="big_text" id="big_news" cols="60" rows="15"></textarea>
            <br>
            <br>
            <input type="submit" value="Сохранить новость">
            <br>
            как загрузить фото

        </form>
    </div>
<?php else:?>

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
<?php endif;?>