function auth() {
    const login=$("#login").val();
    const password=$("#password").val();

    if (!login) {
        $('#error').text('Вы не ввели логин')
    }

    if (!password) {
        $('#error').text('Вы не ввели пароль')
    }

    if (login && password) {

        $.ajax({
            type:"POST",
            url:"/login.php",
            data:{
                login: login,
                password: password,
            }
        }).done((response) => {

            response = JSON.parse(response);

            if (!response.success) {
                $('#error').text(response.message);
                $('#auth').text('');
            } else {
                $('#auth').text(response.message);
                $('#error').text('');
                $('#out').attr('hidden', !response.success);
                $('#login').attr('hidden',true);
                $('#password').attr('hidden', true);
                $('.js-send').attr('hidden', true)
            }
        });
    }
}


function logout() {
    $('#out').attr('hidden', true);
    $('#login').attr('hidden',false);
    $('#password').attr('hidden', false);
    $('.js-send').attr('hidden', false);
    $('#auth').text('');

    $.ajax({
        type:"POST",
        url:"logout.php",
        data:{logout:1}
    }).done((response) => {
        response = JSON.parse(response);
        if(response.success) {
            $('#auth').text(response.message);
        }
    });
}
