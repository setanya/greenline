//console.log(1); проверили подключение
$(document).ready(function () {//чтобы читался файл когда загрузится стр.
    $('#sent_comment').click(function () {
        //console.log(111);//проверили подключение
        let name = $('#name');
        let email = $('#email');
        let message = $('#message');

        if(name.val() != '' && email.val() != '' && message.val() != ''){//если поля не пустые

            $.ajax({
                type: 'post',
                url: '/ajax/comments_ajax.php',
                data : $("#form").serialize(),
                 success: function (data) {
                     console.log(data);
                 }
            });

        }else{//если пустые поля выводит ошибку
            $('#form_error').html('заполните поля');
            //$('#form_error').css();
        }
    });
    $("input, textarea").focus(function () {//очищаем ошибки
        $('#form_error').html('');
    })


});