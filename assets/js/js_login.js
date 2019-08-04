$( document ).ready(function() {
    $('#f_login_correo').focus();
});

$("#f_login").submit(function(e){
    e.preventDefault();
    var f_login_correo   = $('#f_login_correo').val();
    var f_login_password = $('#f_login_password').val();

    $('#alerta_login').fadeOut('fast').html('');
    $('#f_login_correo, #f_login_password').removeClass('form-error');

    if(f_login_correo == ''){
        $("#alerta_login").fadeIn('fast');
        $('#alerta_login').html('<b><i class="fas fa-exclamation-triangle"></i> Atención:</b> Campo incompleto');
        $('#f_login_correo').focus().addClass('form-error');
        return false;
    }
    if(validarCorreo(f_login_correo) == false){
        $("#alerta_login").fadeIn('fast');
        $('#alerta_login').html("<b><i class='fas fa-exclamation-triangle'></i> Atención:</b> La dirección de email es incorrecta");
        $("#f_login_correo").focus().addClass('form-error');
        return false;
    }
    if(f_login_password == ''){
        $("#alerta_login").fadeIn('fast');
        $('#alerta_login').html('<b><i class="fas fa-exclamation-triangle"></i> Atención:</b> Campo incompleto');
        $('#f_login_password').focus().addClass('form-error');
         return false;
    }

    $.ajax({
        type: 'POST',
        data: {
            'f_login_correo'  : f_login_correo,
            'f_login_password': f_login_password
        },
        url: base_url+'panel/ingreso',
        success: function(data){
        var data = jQuery.parseJSON(data);
        console.log(data);
        if(data.conectado == 1){
            $("#alerta_login").fadeOut('fast');
            window.location.replace(base_url+'panel');
        }
        else{
            if(data.error){
                if(data.error_tipo == 1){
                    $("#alerta_login").fadeIn('fast');
                    $('#alerta_login').html('<b><i class="fas fa-exclamation-triangle"></i> Atención:</b> '+data.error_text);
                };
            }
        }
      }
    });
});

function validarCorreo(valor) {
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
    if(reg.test(valor)) { return true; }else{ return false; }
}