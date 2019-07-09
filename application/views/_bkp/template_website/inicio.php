	<div class="panel_principal">
		<div class="cuerpo">
			<!-- <div style="font-size: 25px;"><b>M</b>Usuario</div> -->
      <a href="<?php echo base_url(); ?>">
         <img src="<?php echo base_url(); ?>img/logo.png" width="130px" alt="">
      </a>
			<div class="principal_data">
					<div class="pretitulo">CREA SOPRENDENTES Y COMPLETOS</div>
					<span class="titulo">Manuales de Usuarios</span>
					<div class="descripcion" style="width: 85%;">
						Crea simples pero completos manuales de usuarios, para tus software, productos. Los documentos creados pueden ser públicos o privados.
					</div>
					<i class="fa fa-file-text" aria-hidden="true"></i>
          <a href="http://manualusuario.com/doc/reader/1" target="_blank">Ver Ejemplo</a>
          <br><br><br><br>
          <div style="font-weight: 200; width: 340px;">
            <div class="row" style="margin-bottom: 10px;">
              <div class="col-xs-2" style="font-size: 24px;">
                <i class="fa fa-bath" aria-hidden="true"></i>
              </div>
              <div class="col-xs-10"><b>Creación:</b> Lorem ipsum dolor sit amet dolor sit amet, consectetur adipisicing elit.</div>
            </div>
            <div class="row" style="margin-bottom: 10px;">
              <div class="col-xs-2" style="font-size: 24px;">
                <i class="fa fa-bath" aria-hidden="true"></i>
              </div>
              <div class="col-xs-10"><b>Creación:</b> Lorem ipsum dolor Lorem ipsum dolor sit amet, consectetur adipisicing elit.</div>
            </div>
            <div class="row" style="margin-bottom: 10px;">
              <div class="col-xs-2" style="font-size: 24px;">
                <i class="fa fa-bath" aria-hidden="true"></i>
              </div>
              <div class="col-xs-10"><b>Creación:</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit sit amet.</div>
            </div>
          </div>
			</div>
			
		</div>
	</div>
	<div class="panel_login">

  <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 20px;">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">INGRESO</a></li>
    <li class="pull-right" role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">REGISTRO</a></li>
  </ul>
	<br>
  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
      <form action="" id="f_login" method="POST" role="form">

          <div class="form-group">
            <input type="text" class="form-control" id="f_login_correo" name="f_login_correo" placeholder="Correo Electrónico">
          </div>        
          <div class="form-group">
            <div class="row">
              <div class="col-sm-12">
                <input type="password" class="form-control" id="f_login_password" name="f_login_password" placeholder="Contraseña">
              </div>
            </div>
          </div>
        <div class="row">
          <div class="col-sm-12 text-right">
            <span class="pull-left" style="padding-top: 6px;">
              <a href="<?php echo base_url(); ?>usuario/recuperar">Recuperar Contraseña</a>
            </span>
            <button type="submit" class="btn btn-primary">Ingresar</button>
          </div>
          <div class="col-sm-12">
            <div id="login_error" class="login_reg_error pull-left"></div>
          </div>
        </div>
      </form>
    </div>


  <style>
    .login_reg_error{
      margin-top: 10px;
      color: red; 
    }
  </style>
    <script>
      // SCRIPT INGRESO


      $("#f_login").submit(function(e){
        e.preventDefault();

        $('#login_error').html('');

        var f_login_correo   = $('#f_login_correo').val();
        var f_login_password = $('#f_login_password').val();

        // if(f_login_correo == ''){
        //   $('#login_error').html('Correo no valido');
        //   $('#f_login_correo').focus();
        //   return false;
        // }
        if(f_login_correo == ''){
          $('#login_error').html('Campo incompleto');
          $('#f_login_correo').focus();
          return false;
        }


        if(validarCorreo(f_login_correo) == false){
            $('#login_error').html("La dirección de email es incorrecta.");
            $("#f_login_correo").focus();
            return false;
        }

        if(f_login_password == ''){
          $('#login_error').html('Campo incompleto');
          $('#f_login_password').focus();
          return false;
        }

        var form_data = { 
          f_login_correo: f_login_correo, 
          f_login_password: f_login_password
        };

        $.ajax({
          type: "POST",
          url: "usuario/ingreso",
          data: form_data,
          success: function(return_data){
            return_data = jQuery.parseJSON(return_data);
            if(return_data.error){
              if(return_data.error_tipo == 1){
                $('#login_error').html('Datos incorrectos');
              };
              if(return_data.error_tipo == 2){
                location.reload();
              };
            }else{
              location.reload();
            }
          }
        });

      });
    </script>
    <div role="tabpanel" class="tab-pane" id="profile">

          <div class="form-group">
            <div class="row">
              <div class="col-sm-6">
                <input type="text" class="form-control" id="f_usuario_nombre" name="f_usuario_nombre" placeholder="Nombre"> 
              </div>
              <div class="col-sm-6">
                <input type="text" class="form-control" id="f_usuario_apellido" name="f_usuario_apellido" placeholder="Apellidos">  
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-sm-12">
              <input type="text" class="form-control" id="f_usuario_correo" name="f_usuario_correo" placeholder="Correo Electrónico">
              </div>
            </div>
          </div>        
          <div class="form-group">
            <div class="row">
              <div class="col-sm-12">
                <input type="password" class="form-control" id="f_usuario_contra" name="f_usuario_contra" placeholder="Contraseña">
              </div>
            </div>
          </div>       
          <div class="form-group">
            <div class="row">
              <div class="col-sm-12">
                <input type="password" class="form-control" id="f_usuario_contra_confirm" name="f_usuario_contra_confirm" placeholder="Confirmación de Contraseña">
              </div>
            </div>
          </div>
        <div class="row">
          <div class="col-sm-12 text-right">
            <button id="usuario_registrar" type="button" class="btn btn-primary">Registrarme</button>
          </div>
          <div class="col-sm-12">
            <div id="reg_error" class="login_reg_error pull-left"></div>
          </div>
        </div>

    </div>
  </div>


    <script>
      $('#usuario_registrar').click(function(event)
      {
        $('#reg_error').html('');

          var f_usuario_nombre         =   $('#f_usuario_nombre').val(); 
          var f_usuario_apellido       = $('#f_usuario_apellido').val(); 
          var f_usuario_correo         =   $('#f_usuario_correo').val(); 
          var f_usuario_contra         =   $('#f_usuario_contra').val(); 
          var f_usuario_contra_confirm = $('#f_usuario_contra_confirm').val();

          if(f_usuario_nombre == ''){
            $('#reg_error').html('Campo Obligatorio');
            $('#f_usuario_nombre').focus();
            return false;
          }
          if(f_usuario_apellido == ''){
            $('#reg_error').html('Campo Obligatorio');
            $('#f_usuario_apellido').focus();
            return false;
          }
          if(f_usuario_correo == ''){
            $('#reg_error').html('Campo Obligatorio');
            $('#f_usuario_correo').focus();
            return false;
          }


          if(validarCorreo(f_usuario_correo) == false){
              $('#reg_error').html("La dirección de email es incorrecta.");
              $("#f_usuario_correo").focus();
              return false;
          }

          if(f_usuario_contra.length == 0){
            $('#reg_error').html('Campo Obligatorio');
            $('#f_usuario_contra').focus();
            return false;
          }

          var espacios = false;
          var cont = 0;
          while (!espacios && (cont < f_usuario_contra.length)) {
            if (f_usuario_contra.charAt(cont) == " ")
              espacios = true;
            cont++;
          }
           
          if (espacios) {
            $('#reg_error').html('La contraseña posee espacios en blanco.');
            return false;
          }

          if(f_usuario_contra.length < 8){
            $('#reg_error').html('Contraseña muy corta');
            $('#f_usuario_contra').focus();
            return false;
          }

          if(f_usuario_contra_confirm.length == 0){
            $('#reg_error').html('Campo Obligatorio');
            $('#f_usuario_contra_confirm').focus();
            return false;
          }
          if(f_usuario_contra_confirm != f_usuario_contra){
            $('#reg_error').html('Confirmación Incorrecta');
            $('#f_usuario_contra_confirm').focus();
            return false;
          }

          var form_data = { 
            f_usuario_nombre:   f_usuario_nombre, 
            f_usuario_apellido: f_usuario_apellido, 
            f_usuario_correo:   f_usuario_correo, 
            f_usuario_contra:   f_usuario_contra, 
            f_usuario_contra_confirm: f_usuario_contra_confirm
          };

          $.ajax({
            type: "POST",
            url: "usuario/registro",
            data: form_data,
            success: function(return_data){
              return_data = jQuery.parseJSON(return_data);
              if(return_data.error){
                if(return_data.error_tipo == 1){
                  $('#reg_error').html('Correo en uso');
                }
                if(return_data.error_tipo == 2){
                  location.reload();
                }
              }else{
                alert('Registro y login de usuario');
                location.reload();
              }
            }
          });
        
      });
    </script>
    
        <div class="copyright"> Copyright  © <?php echo date('Y'); ?> MUsuario.com</div>
	</div>

  <div class="imagen_fondo"></div>
  <div class="imagen_tapiz"></div>
