
$(document).ready(function(){
    $("#navLogin").click(function(){
        $("#authenticationModal").modal('show');
    });
    
});
$(document).ready(function(){
    $("#register-form").hide();
    $("#login-button").addClass('login-registrartion-button_li_active');
    $("#login-button").click(function(){
        $("#login-form").show();
        $("#login-registrartion-button").show();
        $("#register-form").hide();
        $("#login-button").addClass('login-registrartion-button_li_active');
        $("#registration-button").removeClass('login-registrartion-button_li_active');
    });
    $("#registration-button").click(function(){
        $("#login-form").hide();
        $("#login-registrartion-button").show();
        $("#register-form").show();
        $("#registration-button").addClass('login-registrartion-button_li_active');
        $("#login-button").removeClass('login-registrartion-button_li_active');
    });


    //user login ajax
    $("#userLogin").submit(function(e){
        e.preventDefault();
        $.ajax({
                type:'POST',
                url:config.routes.zone,
                data:{"action":"login", email:$("#user_email").val(), password:$("#user_password").val()},
                dataType: 'json',
                headers: {
                    // "Authorization": "Bearer "+token,
                    "Accept": "application/json",
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                },
                success: function(data){		
                    console.log(data);
                    window.location.reload();
                    Swal.fire(
                    'Login Successful',
                    'You clicked the button!',
                    'success'
                    )
                },
                error: function(data){
                    console.log(data);
                    $('#errorMsg').show();
                }
            });
        return false;
    });
    //user registration ajax
    $("#userRegistration").submit(function(e){
        e.preventDefault();
        $.ajax({
                type:'POST',
                url:config.routes.registration,
                data:{"action":"registration", name:$("#register_name").val(), email:$("#register_email").val(), password:$("#register_password").val(), password_confirmation:$("#password-confirm").val()},
                dataType: 'json',
                headers: {
                    // "Authorization": "Bearer "+token,
                    "Accept": "application/json",
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                },
                success: function(data){		
                    console.log(data);
                    window.location.reload();
                    Swal.fire(
                    'Registration Successful',
                    'You clicked the button!',
                    'success'
                    )
                },
                error: function(data){
                    console.log(data);
                    $('#errorRegisterMsg').show();
                }
            });
        return false;
      });
});

 