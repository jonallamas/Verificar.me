<!DOCTYPE html>
<head>
  
<html lang="es">
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TITULO</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo base_url(); ?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/template/01/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/fontawesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Javascript -->
    <script src="<?php echo base_url(); ?>asset/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>scripts/script_tinymce/tinymce.min.js"></script>

    <!-- Prims -->
    <link href="<?php echo base_url(); ?>asset/script_prism/prism.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>asset/script_prism/prism.js"></script>

    <!-- Avtar Dinamico -->
    <script src="<?php echo base_url(); ?>asset/script_avatar/initial.min.js"></script>

  </head>

  <body>
      <nav class="navbar navbar-default" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>admin/docs">Manual<b style="font-weight: 600;">Usuario.com</b></a>
          </div>
      
          <div class="collapse navbar-collapse navbar-ex1-collapse text-right">


            <div style="padding-top:8px; float: right;">
              <img data-name="<?php echo $this->session->userdata('log_usuario_nombre'); ?>" style="border-radius: 5px;" class="profile avatar_navbar" data-width="32px" data-height="32px" draggable="false"/>
              <img data-name="<?php echo $this->session->userdata('log_usuario_nombre'); ?>" style="border-radius: 5px;" class="profile avatar_navbar" data-fontSize="10px" data-width="32px" data-height="32px" draggable="false"/>
            </div>

            
            

            <?php if($page_edit){ ?>
              <div style="margin-top: 10px;">
                <a href="<?php echo base_url(); ?>admin/docs" class="btn btn-sm btn-default">Cancelar</a>
                <button id="edit_wiki" type="button" class="btn btn-sm btn-primary">Guardar Manual</button>
              </div>
            <?php }else{ ?>
            <ul class="nav navbar-nav navbar-right" style="margin-right: 10px;">
              <li><a href="<?php echo base_url(); ?>categorias">Categorías</a></li>
              <li><a href="<?php echo base_url(); ?>admin/docs">Mis Manuales</a></li>
              <li><a href="<?php echo base_url(); ?>usuario/salir">Salir</a></li>
            </ul>
            <?php } ?>
          </div>
        </div>
      </nav>

      <br>
      <br>
      <?php if(!$this->session->userdata('log_usuario_validado')){ ?>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center">
             <div class="panel panel-default">
               <div class="panel-body">
                CORREO DE USUARIO NO VALIDADO
               </div>
             </div>
          </div>
        </div>
      </div>
      <?php } ?>
