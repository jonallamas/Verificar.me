<!DOCTYPE html>
<html class="loading" lang="es" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">

    <title><?php echo $titulo; ?></title>

    <script> var base_url = '<?php echo base_url(); ?>'; </script>
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/css/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/css/images/favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendors/vendors.min.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme/materialize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/pages/login.css">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom/custom.css">
    <!-- END: Custom CSS-->
  </head>
  <!-- END: Head-->
  <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 1-column login-bg  blank-page blank-page" data-open="click" data-menu="vertical-modern-menu" data-col="1-column">
    <div class="row">
      <div class="col s12">
        <div class="container"><div id="login-page" class="row">
  <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
    <form class="login-form" action="" method="post" id="f_login" name="f_login">
      <div class="row">
        <div class="input-field col s12">
          <h5 class="ml-4">Identifícate</h5>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">person_outline</i>
          <input id="f_login_correo" name="f_login_correo" type="text">
          <label for="f_login_correo" class="center-align">Email</label>
        </div>
      </div>
      <div class="row margin">
        <div class="input-field col s12">
          <i class="material-icons prefix pt-2">lock_outline</i>
          <input id="f_login_password" name="f_login_password" type="password">
          <label for="f_login_password">Contraseña</label>
        </div>
      </div>
      <div class="row margin">
        <div class="col s12 m12 l12">
          <div id="alerta_login" class="text-center" style="display: none;"></div>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m12 l12 ml-2 mt-1">
          <p>
            <label>
              <input type="checkbox" />
              <span>Recordar sesión</span>
            </label>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Iniciar sesión</button>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6 m6 l6">
          <p class="margin medium-small">¿Eres nuevo? <a href="registro">Únete ahora</a></p>
        </div>
        <div class="input-field col s6 m6 l6">
          <p class="margin right-align medium-small"><a href="user-forgot-password.html">¿Has olvidado tu contraseña?</a></p>
        </div>
      </div>
    </form>
  </div>
</div>
        </div>
      </div>
    </div>

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url(); ?>assets/css/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="<?php echo base_url(); ?>assets/css/js/plugins.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/css/js/custom/custom-script.js" type="text/javascript"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->

    <script>
        $( document ).ready(function() {
            $('#f_login_correo').focus();
        });

        $("#f_login").submit(function(e)
        {
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
    </script>
  </body>
</html>