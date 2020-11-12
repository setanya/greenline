<?php //pr($_SESSION)?>
<?php if($_SESSION['is_admin'] = '1'):?>
   <div class="form_admin">
        <form action="" method="post" enctype="multipart/form-data">
            <br>
            Категория новостей
            <select class="category" name="category">
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
            Загрузить фото к новости
            <br>
            <input type="file" name="user_file"/><br>
            <br>
            <input type="submit" value="Сохранить новость">
            <br>


        </form>
    </div>
<?php else:?>
<div class="registr">
    <h2>Войти в панель администратора</h2>
	    <form action ="" method="post">
		    <h3>Введите логин:</h3>
			    <input  name ="login"  type="text"/>
                    <span style="color:red;"><br><?=$error['login'];?></span><br/>
	        <h3>Введите пароль:</h3>
			    <input  name ="password" type="password" />
                    <span style="color:red;"><br/><?=$error['password'];?></span><br/>
	        <h3>Подтвердите пароль : </h3>
			    <input  name ="dbl_password" type="password" /><br/>
					<span style="color:red;"><br/><?=$error['dbl_password'];?></span><br/>
            <div class ="forma">
                <input  type ="submit" name ="sub" value= "Войти"/>
            </div>
	    </form>
</div>
<?php endif;?>