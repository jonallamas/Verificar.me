<!DOCTYPE html>
<html class="loading" lang="es" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <title><?php echo $titulo; ?></title>

    <script> var base_url = '<?php echo base_url(); ?>'; </script>
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/css/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/css/images/favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendors/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendors/flag-icon/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendors/materialize-stepper/materialize-stepper.min.css">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme/materialize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/pages/form-wizard.css">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme/modification.css">
</head>
<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 2-columns  " data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">
    <div class="row">
        <div class="content-wrapper-before gradient-45deg-indigo-purple" style="height: 400px;"></div>
    	<style>
    		.logo-cont{
    			position: absolute;
    			top: 75px;
				width: 100%;
				display: block;
    		}
    		.logo-cont p{
    			color: #fff;
    		}
    		.brand-logo img{
				height: 18px;
    		}
    		.brand-logo span{
    			font-size: 24px;
			    visibility: visible;
			    padding-left: 8px;
			    -webkit-transition: opacity .2s linear;
			    -moz-transition: opacity .2s linear;
			    -o-transition: opacity .2s linear;
			    transition: opacity .2s linear;
			    opacity: 1;
			    color: #fff;
    		}
    	</style>
    	<div class="logo-cont">
    		<div class="row">
    			<div class="col s12 m6 offset-m3 center-align">
    				<a class="brand-logo darken-1" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/css/images/logo/materialize-logo.png" alt="materialize logo"><span class="logo-text hide-on-med-and-down">Materialize</span></a>
    				<p>Le recordamos que el servicio permanecerá gratuito durante 30 días, una vez finalizado el mes se le informará para empezar a realizar el pago correspondiente a su plan seleccionado.</p>
    			</div>
    		</div>
    	</div>
            <div class="row">
	        <div class="col s12 m8 offset-m2">
	            <div class="card" style="margin-top: -200px;">
	                <div class="card-content">
	                    <div class="card-header">
	                        <h4 class="card-title">Registra tus datos para empezar a utilizar el sistema</h4>
	                    </div>

	                    <form method="post" class="f_suscripcion" id="f_suscripcion">
	                    	<ul class="stepper linear" id="linearStepper">
	                    	    <li class="step active">
	                    	        <div class="step-title waves-effect">Suscripción</div>
	                    	        <div class="step-content">
	                    	            <div class="row">
	                    	                <div class="input-field col m6 s12">
	                    	                    <select class="validate browser-default" name="f_suscripcion_plan" id="f_suscripcion_plan" required>
	                    	                        <option value="" disabled <?php if($plan_suscripcion == ''){ echo 'selected'; } ?>>Seleccione el plan</option>
	                    	                        <option value="1" <?php if($plan_suscripcion == 'basico'){ echo 'selected'; } ?>>Básico (10€ p/mes)</option>
	                    	                        <option value="2" <?php if($plan_suscripcion == 'pro'){ echo 'selected'; } ?>>Pro (20€ p/mes)</option>
	                    	                        <option value="3" <?php if($plan_suscripcion == 'ultra'){ echo 'selected'; } ?>>Ultra (30€ p/mes)</option>
	                    	                    </select>
	                    	                </div>
	                    	                <div class="input-field col m6 s12">
	                    	                    <select class="validate browser-default" name="f_suscripcion_periodo" id="f_suscripcion_periodo" required>
	                    	                        <option value="" disabled selected>Periodo de pago</option>
	                    	                        <option value="1">Mensual</option>
	                    	                        <option value="6">Semestral</option>
	                    	                        <option value="12">Anual</option>
	                    	                    </select>
	                    	                </div>
	                    	            </div>
	                    	            <div class="step-actions">
	                    	                <div class="row">
	                    	                    <div class="col m6 offset-m2 s12 mb-3">
	                    	                        <button class="waves-effect waves dark btn btn-primary next-step">
	                    	                            Siguiente
	                    	                            <i class="material-icons right">arrow_forward</i>
	                    	                        </button>
	                    	                    </div>
	                    	                </div>
	                    	            </div>
	                    	        </div>
	                    	    </li>
	                    	    <li class="step">
	                    	        <div class="step-title waves-effect">Información personal</div>
	                    	        <div class="step-content">
	                    	            <div class="row">
	                    	                <div class="input-field col m4 s12">
	                    	                    <label for="f_datos_apellido">Apellido: <span class="red-text">*</span></label>
	                    	                    <input type="text" class="validate" id="f_datos_apellido" name="f_datos_apellido" required>
	                    	                </div>
                                            <div class="input-field col m4 s12">
                                                <label for="f_datos_nombre">Nombre: <span class="red-text">*</span></label>
                                                <input type="text" class="validate" id="f_datos_nombre" name="f_datos_nombre" required>
                                            </div>
                                            <div class="input-field col m4 s12">
                                                <label for="f_datos_dni">DNI: <span class="red-text">*</span></label>
                                                <input type="text" class="validate" id="f_datos_dni" name="f_datos_dni" required>
                                            </div>
	                    	            </div>
	                    	            <div class="row">
	                    	                <div class="input-field col m6 s12">
	                    	                    <label for="f_datos_correo">Correo electrónico: <span class="red-text">*</span></label>
	                    	                    <input type="email" class="validate" id="f_datos_correo" name="f_datos_correo" required>
	                    	                </div>
	                    	                <div class="input-field col m6 s12">
	                    	                    <label for="f_datos_telefono">Teléfono: <span class="red-text">*</span></label>
	                    	                    <input type="number" class="validate" id="f_datos_telefono" name="f_datos_telefono" required="">
	                    	                </div>
	                    	            </div>
	                    	            <div class="step-actions">
	                    	                <div class="row">
	                    	                    <div class="col m6 s12 mb-3">
	                    	                        <button class="btn btn-light previous-step">
	                    	                            <i class="material-icons left">arrow_back</i>
	                    	                            Anterior
	                    	                        </button>
	                    	                    </div>
	                    	                    <div class="col m6 s12 mb-3">
	                    	                        <button class="waves-effect waves dark btn btn-primary next-step">
	                    	                            Siguiente
	                    	                            <i class="material-icons right">arrow_forward</i>
	                    	                        </button>
	                    	                    </div>
	                    	                </div>
	                    	            </div>
	                    	        </div>
	                    	    </li>
	                    	    <li class="step">
	                    	        <div class="step-title waves-effect">Datos de acceso</div>
	                    	        <div class="step-content">
	                    	            <div class="row">
	                    	                <div class="input-field col m12 s12">
	                    	                    <label for="f_acceso_correo">Correo de acceso: <span class="red-text">*</span></label>
	                    	                    <input type="email" id="f_acceso_correo" name="f_acceso_correo" class="validate" required>
	                    	                </div>
	                    	            </div>
	                    	            <div class="row">
	                    	                <div class="input-field col m6 s12">
	                    	                    <label for="f_acceso_pass">Contraseña: <span class="red-text">*</span></label>
	                    	                    <input type="password" class="validate" name="f_acceso_pass" id="f_acceso_pass" required>
	                    	                </div>
	                    	                <div class="input-field col m6 s12">
	                    	                    <label for="f_acceso_pass_verificar">Verificar contraseña: <span class="red-text">*</span></label>
	                    	                    <input type="password" class="validate" name="f_acceso_pass_verificar" id="f_acceso_pass_verificar"
	                    	                        required>
	                    	                </div>
	                    	            </div>
	                    	            <div class="step-actions">
	                    	                <div class="row">
	                    	                    <div class="col m6 offset-m2 s12 mb-1">
	                    	                        <button class="waves-effect waves-dark btn btn-primary" type="submit">Crear</button>
	                    	                    </div>
	                    	                </div>
	                    	            </div>
	                    	        </div>
	                    	    </li>
	                    	</ul>
	                    </form>
	                </div>
	            </div>
	        </div>
    	</div>
    </div>

    <div class="preloader-wrapper" id="preloader">
        <div class="preloader">
            <div class="sk-circle">
                <div class="preloader-wrapper big active">
                    <div class="spinner-layer spinner-blue">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                            <div class="circle"></div>
                        </div><div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>

                    <div class="spinner-layer spinner-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                            <div class="circle"></div>
                        </div><div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>

                    <div class="spinner-layer spinner-yellow">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                            <div class="circle"></div>
                        </div><div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>

                    <div class="spinner-layer spinner-green">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div><div class="gap-patch">
                            <div class="circle"></div>
                        </div><div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<script src="<?php echo base_url(); ?>assets/css/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php echo base_url(); ?>assets/css/vendors/materialize-stepper/materialize-stepper.min.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="<?php echo base_url(); ?>assets/css/js/plugins.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/css/js/custom/custom-script.js" type="text/javascript"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?php echo base_url(); ?>assets/css/js/scripts/form-wizard.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->

    <script src="<?php echo base_url(); ?>assets/js/script.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/js_registro_suscripcion.js" type="text/javascript"></script>
</body>
</html>