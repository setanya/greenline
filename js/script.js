//console.log(1); проверили подключение
$(document).ready(function () {//чтобы читался файл когда загрузится стр.
    $('#sent_comment').click(function () {//при клике на <input type="button" name="sent" id="sent_comment" value="Отправить" class="send_button" />
        //console.log(111);//проверили подключение
        let name = $('#name');//создаем переменную для получения из поля имя
        let email = $('#email');//создаем переменную для получения из поля мейл
        let message = $('#message');//создаем переменную для получения из поля сообщение

        if(name.val() != '' && email.val() != '' && message.val() != ''){//если поля не пустые
            $.ajax({//аякс запрос
                type: 'post',//методом пост
                url: '/ajax/comments_ajax.php',//в какой папке
                data : $("#form").serialize(),//обращаемся к <form id="form">
                 success: function (data) {//вернуть функцию с параметрами=> data : $("#form").serialize(),
                     // console.log(data);//выводим данные вернувшиеся из аякса
                 //$("#comments"). html(data);
                let d = JSON.parse(data) ;//преобразует джейсон в объект
               //console.log(d);
                     $("#comments"). html(d.comments);
                     $("#cc"). html(d.cc);
                // let cc = $("#cc").html ();//получаем число коментариев из span если пустая тогда записываем в переменную
                //      let newCc= parseInt(cc) + 1;// счётчик коментариев  увеличиваем на +1
                //          $("#cc").html (newCc);//перезаписываем счётчик комментариев span

                     name.val('');//очистили поле
                     email.val('');//очистили поле
                     message.val('');//очистили поле
                }
            });

        }else{//если пустые поля выводит ошибку <div class="error" id="form_error"></div>
            $('#form_error').html('заполните поля');//выводим текст
            $('#form_error').css('color','red');//текст красный
        }
    });
    $("input, textarea").focus(function() { //очищаем ошибки <div class="error" id="form_error"></div>
        $('#form_error').html('');
    });


});