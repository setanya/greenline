<?php
//$arNews - список новостей взятый из базы 
//$res = mysqli_query($link, "SELECT n.`id`, n.`title`, n.`preview_text`, n.`date`, n.`image`, n.`comments_cnt`, c.`title` AS news_cat  FROM `news`n JOIN `category`c ON c.`id`= n.`category_id`");
//$arNews =  mysqli_fetch_all($res, MYSQLI_ASSOC); ?>

<?if(!empty($arNews)):?>

    <?foreach($arNews as $news):?>
        <div class="article">
            <h2><?=$news['title'];?></h2>
            <div class="clr"></div>
            <p><span class="date"><?=$news['news_date'];?></span> Автор <a href="#">Admin</a> &nbsp;|&nbsp; Категория <a href="#"><?=$news['news_cat'];?></a></p>
            <img src="images/<?=$news['image'];?>" width="625" height="205" alt="" />
            <p><?=$news['preview_text'];?></p>
            <p class="spec"><a href="/news_detail.php?id=<?=$news['id'];?>" class="rm">Читать далее &raquo;</a> <a href="#" class="com"><span><?=$news['comments_cnt'];?></span> Комментариев</a></p>
        </div>
    <?endforeach;?>

    <?=$navigation;?><?// передаем шаблон навигации?>
        
    <?else:?>
        <p> Новостей нет</p>
<?endif?>
