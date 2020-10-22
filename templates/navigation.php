<?php if(!empty($arPage)):?>

    <p class="pages">
        <small>Страница <?=$curPage;?> из <?=$totalPage;?></small><?//вывели переменные?>

        <?foreach($arPage as $nPage):?><?//перебираем страницы?>

            <?if($curPage == $nPage):?><?//если текущая страница?>
                <span><?=$nPage;?></span><?//текущая страница?>
            <?else:?>
                <a href="?page=<?=$nPage;?>"><?=$nPage;?></a> <?//формируем ссылки на страницы?>
            <?php endif;?>  
            
        <?endforeach;?>
                <a href="?page=<?=$totalPage;?>">&raquo;</a>
    </p>
<?php endif;?>