$("#f_suscripcion").submit(function(e){
    e.preventDefault();
    var f_acceso_correo = $('#f_acceso_correo').val();
    var f_acceso_pass = $('#f_acceso_pass').val();
    var f_acceso_pass_verificar = $('#f_acceso_pass_verificar').val();

    if(f_acceso_correo == ''){
    	$('#f_acceso_correo').focus();
    	return false;
    }

    if(f_acceso_pass != f_acceso_pass_verificar){
    	$('#f_acceso_pass').addClass('invalid').focus();
    	$('#f_acceso_pass_verificar').addClass('invalid');
    	return false;
    }

    $.ajax({
        type: 'POST',
        data: {
        	'f_suscripcion_plan' : $('#f_suscripcion_plan').val(),
        	'f_suscripcion_periodo' : $('#f_suscripcion_periodo').val(),

        	'f_datos_apellido' : $('#f_datos_apellido').val(),
        	'f_datos_nombre' : $('#f_datos_nombre').val(),
        	'f_datos_correo' : $('#f_datos_correo').val(),
        	'f_datos_telefono' : $('#f_datos_telefono').val(),

        	'f_acceso_correo' : f_acceso_correo,
        	'f_acceso_pass' : f_acceso_pass
        },
        url: base_url+'suscripcion/registrarse',
        success: function(data){
        var data = jQuery.parseJSON(data);
        console.log(data);
        if(data.conectado == 1){
            $("#alerta_login").fadeOut('fast');
            window.location.replace(base_url+'panel');
        }else{
            console.log('No fue posible');
        }
      }
    });
});