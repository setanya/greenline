<?php if($show):?>
    <p class="pages">
        <small>Страница <?=$curPage;?> из <?=$totalPage;?></small><?//вывели переменные?>
            <?if($curPage > 1):?><?//выводим ссылку на первую стр если нужна?>
            <a href="?<?=setPageParam('page', 1);?>">&laquo;</a><!--?page=1-->
            <?php endif;?>  
            <?//выводим ссылку на предыдущую стр?>
            <?if($prevPage != ''):?><?//если предыдущая стр не равна пустоте?>
                <a href="?<?=setPageParam('page',$prevPage);?>"><?=$prevPage;?></a><!--<a href="?page=<?//=$prevPage;?>">-->
            <?php endif;?>   

            <span><?=$curPage;?></span><?//текущая страница?>
            <?//выводим ссылку на следующую  стр?>
            <?if($nextPage != ''):?><?//если следующая стр не равна пустоте?>
            <a href="?<?=setPageParam('page',$nextPage);?>"><?=$nextPage;?></a>
            <?php endif;?> 
            <?// выводим ссылку на последнюю стр?>
            <?if($curPage < $totalPage):?>
            <a href="?<?=setPageParam('page',$totalPage);?>">&raquo;</a>
            <?php endif;?>
    </p>
<?php endif;?>
<?php
//var_dump($prevPage);
//var_dump($nextPage);
?>