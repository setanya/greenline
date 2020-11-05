<?
require_once 'core/init.php';//подключение всех нужных  файлов

?>
<style>
    .form_admin{
        margin: 0 auto;
        width: 500px;
        border: 1px solid black;
        padding: 10px;
        font-size: 16px;
        font-weight: bold;
    }
    .news{
        width: 450px;
    }
</style>
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