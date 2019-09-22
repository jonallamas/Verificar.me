<!DOCTYPE html>
<html class="loading" lang="es" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <title><?php echo $titulo; ?> | Verifica.me</title>

    <script> var base_url = '<?php echo base_url(); ?>'; </script>

    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>assets/css/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/css/images/favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/fonts/fontawesome/css/all.css">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendors/vendors.min.css">


    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme/materialize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme/style.css">

    <script src="<?php echo base_url(); ?>assets/css/js/vendors.min.js" type="text/javascript"></script>


    <script src="<?php echo base_url(); ?>assets/css/js/plugins.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/css/js/custom/custom-script.js" type="text/javascript"></script>

    <script src="<?php echo base_url(); ?>assets/css/js/scripts/intro.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/script.js" type="text/javascript"></script>

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendors/data-tables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/pages/data-tables.css">
    <script src="<?php echo base_url(); ?>assets/css/vendors/data-tables/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/css/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>

    <!-- Modificaciones CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom/custom.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/theme/modification.css">

    <!-- Validate -->
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/css/vendors/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/css/vendors/jquery-validation/localization/messages_es.js"></script>
  </head>
  <body>
    <div id="modalActionGeneral" class="modal">
        <div class="modal-content center-align">
            <h6 id="modalActionGeneral_texto"></h6>
            <h5 id="modalActionGeneral_data"></h5>
        </div>
        <div class="modal-footer right-align">
            <button type="button" class="modal-action modal-close waves-effect btn-flat">Cancelar</button>
            <button type="button" id="modalActionGeneral_btn" class="modal-action btn waves-effect waves-light">Eliminar</button>
        </div>
    </div>

    <header class="page-topbar" id="header">
        <div class="navbar">
            <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-indigo-blue no-shadow">
                <div class="nav-wrapper">
                    <!-- <div class="header-search-wrapper hide-on-med-and-down"><i class="material-icons">search</i>
                      <input class="header-search-input z-depth-2" type="text" name="Search" placeholder="Busca aqui empleados, establecimientos ...">
                    </d -->iv>
                    <?php 

                        $notificaciones = 0;
                        if($cuenta->cant_empresas == $cuenta->suscripcion_cant_empresas){
                            $notificaciones++;
                        }
                        if($cuenta->cant_establecimientos == $cuenta->suscripcion_cant_establecimientos){
                            $notificaciones++;
                        }

                    ?>
                    <ul class="navbar-list right">
                        <!-- <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light translation-button" href="javascript:void(0);" data-target="translation-dropdown"><span class="flag-icon flag-icon-gb"></span></a></li> -->
                        <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);"><i class="material-icons">settings_overscan</i></a></li>
                        <li class="hide-on-large-only"><a class="waves-effect waves-block waves-light search-button" href="javascript:void(0);"><i class="material-icons">search</i></a></li>
                        <li>
                            <a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);" data-target="notifications-dropdown">
                                <i class="material-icons">
                                    notifications_none
                                    <?php if($notificaciones != 0){ ?>
                                    <small class="notification-badge pulse"><?php echo $notificaciones; ?></small>
                                    <?php } ?>
                                </i>
                            </a>
                        </li>
                        <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="<?php echo base_url(); ?>assets/css/images/profile_user_default.png" alt="avatar"><i></i></span></a></li>
                        <li><a class="waves-effect waves-block waves-light sidenav-trigger" href="#" data-target="slide-out-right"><i class="material-icons">format_indent_increase</i></a></li>
                    </ul>
                    <!-- <ul class="dropdown-content" id="translation-dropdown">
                        <li><a class="grey-text text-darken-1" href="#!"><i class="flag-icon flag-icon-gb"></i> English</a></li>
                        <li><a class="grey-text text-darken-1" href="#!"><i class="flag-icon flag-icon-fr"></i> French</a></li>
                        <li><a class="grey-text text-darken-1" href="#!"><i class="flag-icon flag-icon-cn"></i> Chinese</a></li>
                        <li><a class="grey-text text-darken-1" href="#!"><i class="flag-icon flag-icon-de"></i> German</a></li>
                    </ul> -->
                    <ul class="dropdown-content" id="notifications-dropdown">
                        <li>
                            <h6>
                                NOTIFICATIONS
                                <?php if($notificaciones != 0){ ?>
                                <span class="new badge"><?php echo $notificaciones; ?></span>
                                <?php } ?>
                            </h6>
                        </li>
                        <li class="divider"></li>
                        <?php if($cuenta->cant_empresas == $cuenta->suscripcion_cant_empresas){ ?>
                        <li><a class="grey-text text-darken-2" href="#!"><span class="material-icons icon-bg-circle red small">settings</span> Límite de Empresas</a>
                            <p class="media-meta">Ha alcanzado el límite máximo de empresas por crear.</p>
                        </li>
                        <?php } ?>
                        <?php if($cuenta->cant_establecimientos == $cuenta->suscripcion_cant_establecimientos){ ?>
                        <li><a class="grey-text text-darken-2" href="#!"><span class="material-icons icon-bg-circle red small">settings</span> Límite de Establecimientos</a>
                            <p class="media-meta">Ha alcanzado el límite máximo de establecimientos por crear.</p>
                        </li>
                        <?php } ?>
                        <?php if($cuenta->cant_establecimientos < $cuenta->suscripcion_cant_establecimientos && $cuenta->cant_empresas < $cuenta->suscripcion_cant_empresas){ ?>
                        <li>
                            Actualmente no posee notificaciones
                        </li>
                        <?php } ?>
                    </ul>
                    <ul class="dropdown-content" id="profile-dropdown">
                        <!-- <li><a class="grey-text text-darken-1" href="user-profile-page.html"><i class="material-icons">person_outline</i> Profile</a></li> -->
                        <!-- <li><a class="grey-text text-darken-1" href="app-chat.html"><i class="material-icons">chat_bubble_outline</i> Chat</a></li> -->
                        <!-- <li><a class="grey-text text-darken-1" href="page-faq.html"><i class="material-icons">help_outline</i> Help</a></li> -->
                        <!-- <li class="divider"></li> -->
                        <!-- <li><a class="grey-text text-darken-1" href="user-lock-screen.html"><i class="material-icons">lock_outline</i> Lock</a></li> -->

                        <li><a class="grey-text text-darken-1" href="<?php echo base_url(); ?>panel/salir"><i class="material-icons">keyboard_tab</i> Logout</a></li>
                    </ul>
                </div>
                <nav class="display-none search-sm">
                    <div class="nav-wrapper">
                        <form>
                            <div class="input-field">
                                <input class="search-box-sm" type="search" required="">
                                <label class="label-icon" for="search"><i class="material-icons search-sm-icon">search</i></label><i class="material-icons search-sm-close">close</i>
                            </div>
                        </form>
                    </div>
                </nav>
            </nav>
        </div>
    </header>

    <?php echo $menu; ?>
    
    <div id="main">
        <div class="row">