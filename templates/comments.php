<?php
//pr($arComments);проверяем приходит ли массив
if (!empty($arComments)):?><?//если массив с новостями не пустой?>


    <?php foreach ($arComments as $comment):?><?//тогда запускаем цикл и в шаблон вставляем ключи массива?>
    <div class="clr"></div>
            <div class="comment"> <a href="#"><img src="images/userpic.gif" width="40" height="40" alt="" class="userpic" /></a>
                <p><a href="#"><?=$comment['author']?>></a> Says:<br />
                    <?=$comment['date']?></p>
                <p><?=$comment['text']?></p>
            </div>

    <?php endforeach;?>

<?php else:?>
    <p>Комментариев пока нет</p>
<?php endif;?>