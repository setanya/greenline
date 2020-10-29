
<style>
h2{
      color: black;
}
table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
}
th, td {
      padding: 5px;
      text-align: left;
}
</style>
<h2>Передаем текст</h2>

<table style="width:100%">
      <caption>Техническая поддержка</caption>
      
                  <tr>
                        <th>Title</th>
                        <th><?=getWeekday(3);?></th>
                  </tr>
                  <?if(!empty($arSUPPORT)):?>
                        <?foreach($arSUPPORT as $supp):?>
                  <tr>
                        <td><?=$supp['title'];?></td>
                        <td><?=$supp['text'];?></td>
                  </tr>
            <?endforeach;?>
            <?else:?>
                  <p>Сообщений  нет</p>
            <?endif;?>
</table>
<?//pr($test);?>
