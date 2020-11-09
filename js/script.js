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
                // let cc = $("#cc").html ();//получаем число коментариев из span если пустая тогда записываем в переменную
                // let newCc= parseInt(cc) + 1;// счётчик коментариев  увеличиваем на +1
                // $("#cc").html (newCc);//перезаписываем счётчик комментариев span
                     let d = JSON.parse(data) ;//преобразует джейсон в объект
                     //console.log(d);
                     $("#comments"). html(d.comments);
                     $("#cc"). html(d.cc);

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
        $(".error_email").html('');
    });
    //функция для получения * email *
        $("#sent_sub").click(function (){
            $.ajax({//аякс запрос
                type: 'post',//методом пост
                url: '/ajax/email_ajax.php',//в какой папке
                data : $("form.subscribe").serialize(),//обращаемся к <form id="form">
                success: function (data){
                    //console.log(data);
                    $(".error_email").html(data);
                    $(".error_email").css('color','red');
                }
            });
        });




    //$("#sub_but").click(function(){// при клике на кнопку ПОДПИСАТЬСЯ

        //console.log(123);
        //let email_mail = $('#sub_email');//1)создаем переменную для получения из поля мейл <input id ="sub_email"type="email" name="email" placeholder="Ваш email" />
        //console.log(email_mail.val());
        //console.log($("#subscribe");
    //2)создаем аякс запрос
        //console.log( $("#subscribe")) ;
        //if(email_mail.val() != '' ){
        //     $.ajax({//аякс запрос
        //         type: 'post',//методом пост
        //         url: '/ajax/email_ajax.php',//с какой папки вернуть ответ
        //         data : $("#subscribe").serialize(),//обращаемся к <form id="subscribe">
        //         // data :{
        //         //     email:email_mail.val()
        //         // },
        //         success: function (d) {//вернуть функцию с параметрами => data : $(".subscribe").serialize()
        //             $(".error_email").html('Вы подписаны на новости');
        //             $(".error_email").css('color','red');
        //            //  let a = d ;
        //            //
        //            //  console.log(a);//выводим данные вернувшиеся из аякса
        //             email_mail.val('');//очистили поле *let email_mail = $('#sub_email');*
        //         }
        //     });
    //});




});