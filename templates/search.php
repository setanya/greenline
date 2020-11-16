
<?if(!empty($arResult)):?>

    <?foreach($arResult as $news):?>
        <?php// pr($news)?>
        <div class="article">
            <h2><?=$news['title'];?></h2>
            <div class="clr"></div>
            <p><span class="date"><?=$news['news_date'];?></span> Автор <a href="#">Admin</a> &nbsp;|&nbsp; Категория <a href="#"><?=$news['news_cat'];?></a></p>
            <img src="<?=IMG_PATH?>/<?=$news['image'];?>" width="625" height="205" alt="" />
            <p><?=$news['detail_text'];?></p>
            <p class="spec"><a href="/news_detail.php?id=<?=$news['id'];?>" class="rm">Читать далее &raquo;</a> <a href="#" class="com"><span><?=$news['comments_cnt'];?></span> Комментариев</a></p>
        </div>

    <?endforeach;?>

    <?=$navigation;?><?// передаем шаблон навигации?>

<?else:?>
    <p> Повашему запросу ничего не найдено</p>
<?endif?>