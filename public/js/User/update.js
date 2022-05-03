console.log("Começo")
$("#btn_update").click(function(){
    let username = $('#username').val();
    let email = $('#email').val();
    let password = $('#password').val();
    let id = $('#id').val();

    $.ajax({
        url: '/update',
        method: 'POST',
        data: {
            username: username,
            email: email,
            password: password,
            id: id,
        }
    }).done(function(response){
        $('.form-control').removeClass('border-danger')
        if(!response.success){
            console.log(response);
            response.data.forEach((key,value) => {
                $(`#${key}`).addClass("border-danger");
            });
        }
        return sweatAlert(response).then(() => {
           if(response.success){
                window.location = "/";
           }


       });
        
    });
});

console.log("Meio")

$("#btn_delete").click(function(){
    let id = $('#id').val();

    $.ajax({
        url: '/delete',
        method: 'POST',
        data: {
            id: id,
        }
    }).done(function(response){
       return sweatAlert(response).then(() => {
           window.location = "/";
       });
        
    });
});

console.log("Fim")