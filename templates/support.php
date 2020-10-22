<div class="article">
      <h2><span>Поддержка</span> Имя компании</h2>
      <div class="clr"></div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
        <strong>Suspendisse nulla ligula, blandit ultricies aliquet ac, lobortis in massa. Nunc dolor sem,
        tincidunt vitae viverra in, egestas sed lacus.</strong> 
        Etiam in ullamcorper felis. Nulla cursus feugiat leo, ut dictum metus semper a. Vivamus euismod, 
        arcu gravida sollicitudin vestibulum, quam sem tempus quam, quis ullamcorper erat nunc in massa.
        Donec aliquet ante non diam sollicitudin quis auctor velit sodales. Morbi neque est, posuere at
        fringilla non, mollis nec nibh.
      </p>
      <p><strong>Услуги по технической поддержке</strong></p>
      <p>Казалось бы, сайт создан и можно радоваться, получая результат от появления в сети. Однако, чтобы оставаться
        конкурентоспособным, интересным потенциальным клиентам в Интернете и уникальным необходимо заказать поддержку 
        сайта. За стоимостью технической поддержки сайта скрывается комплекс услуг, которые решают множество задач..
      </p>
    <!--  блок с выводом новостей страниц --> 
      <?if(!empty($arsupports)):?><?//если не пустая переменная с массивом $page_content = renderTemplate("support",['arsupports'=>$arSupport]);=>$arsupports?>
        <ul>
          <?foreach($arsupports as $supp)://цикл с новостями?>
            <li class="block-question">
              <p class="question"><?=$supp['title'];?></p>
              <p class="ans"><?=$supp['text'];?></p>
            </li>
          <?endforeach;?>
        </ul>
      <?else:?>
        <p>Сообщений  нет</p>
      <?endif;?>
  <!--  блок со счетчиком страниц -->    
      <div>
        <p class="pages">
          <small>Страница <?=$numStr;?> из <?=$quantityStr;?></small><?//вывели переменные <передаем текущюю страницу> из <кол-во страниц>?>
          <a href="?page=<?=$numStr-1;?>"><<</a><?//предыдущая страница?>
          <?foreach($arstr as $nstr):?><?//перебираем массив со страницами?>
          
                <?if($arstr == $nstr):?><?//если текущая страница == номеру массива?>

                <?else:?><?//в гет параметры передаём № стр. и ссыку с номером делаем активным?>
                  <a href="?page=<?=$nstr;?>"><?=$nstr;?></a> <?//формируем ссылки на страницы?>
                <?php endif;?>        
            <?endforeach;?>
            <a href="?page=<?=$numStr+1;?>">>></a><?//вывели переменные <передаем текущюю страницу> + 1?>
          <a href="?page=<?=$quantityStr;?>">последняя страница</a><?//вывели переменную  <кол-во страниц> последняя ?>

        </p>
      </div>

</div>