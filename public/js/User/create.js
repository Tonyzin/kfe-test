$("#createAccount").click(function(){
    let username = $('#username').val();
    let email = $('#email').val();
    let password = $('#password').val();

    $.ajax({
        url: '/create',
        method: 'POST',
        data: {
            username: username,
            email: email,
            password: password
        }
    }).done(function(response){
        $('.form-control').removeClass("border-danger");
        if(!response.success){
            response.data.forEach((key,values) => {
                $(`#${key}`).addClass("border-danger");
            });
        }
        return sweatAlert(response).then(() => {
            if(response.success){
                window.location = "/"
            }
        });
    });
});