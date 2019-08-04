    <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark sidenav-active-square">
      <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><img src="<?php echo base_url(); ?>assets/css/images/logo/materialize-logo-color.png" alt="materialize logo"/><span class="logo-text hide-on-med-and-down">Materialize</span></a>
          <!-- <a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a> -->
        </h1>
      </div>
      <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        <li><a class="<?php if($seccion == 'principal'){ echo 'active'; } ?>" href="<?php echo base_url(); ?>panel" data-i18n=""><i class="material-icons">home</i><span>Inicio</span></a></li>

        <li class="navigation-header"><a class="navigation-header-text">PANEL DE CONTROL </a><i class="navigation-header-icon material-icons">more_horiz</i></li>
        <li><a class="<?php if($seccion == 'empresas'){ echo 'active'; } ?>" href="<?php echo base_url(); ?>empresas"><i class="material-icons">business_center</i><span>Empresas</span></a></li>
        <li><a class="<?php if($seccion == 'establecimientos'){ echo 'active'; } ?>" href="<?php echo base_url(); ?>establecimientos"><i class="material-icons">business</i><span>Establecimientos</span></a></li>
        <!-- <li><a class="<?php //if($seccion == 'empleados'){ echo 'active'; } ?>" href="<?php //echo base_url(); ?>empleados"><i class="material-icons">assignment_ind</i><span>Empleados</span></a></li> -->

        <!-- <li class="navigation-header"><a class="navigation-header-text">MI CUENTA </a><i class="navigation-header-icon material-icons">more_horiz</i></li> -->
        <!-- <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="#"><i class="material-icons">settings</i><span class="menu-title" data-i18n="">Ajustes</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a class="collapsible-body" href="charts-chartjs.html" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Editar Información</span></a></li>
                    <li><a class="collapsible-body" href="charts-chartist.html" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Chartist</span></a></li>
                    <li><a class="collapsible-body" href="charts-sparklines.html" data-i18n=""><i class="material-icons">radio_button_unchecked</i><span>Sparkline Charts</span></a></li>
                </ul>
            </div>
        </li> -->
        <!-- <li class="bold gradient-45deg-deep-orange-orange"><a class="waves-effect waves-cyan " href="suscripcion"><i class="material-icons">stars</i><span class="menu-title" data-i18n="">Suscripción</span></a></li> -->

        <!-- Menú sobre la utilización del sistema -->
        <!-- <li class="navigation-header"><a class="navigation-header-text">Misc </a><i class="navigation-header-icon material-icons">more_horiz</i></li> -->
        <!-- <li class="bold"><a class="waves-effect waves-cyan " href="guia"><i class="material-icons">track_changes</i><span class="menu-title" data-i18n="">Cómo funciona</span><span class="badge badge pill light-blue float-right mr-10">Guía</span></a></li> -->
        <!-- <li class="bold"><a class="waves-effect waves-cyan " href="ayuda"><i class="material-icons">import_contacts</i><span class="menu-title" data-i18n="">Documentation</span></a></li> -->
        <!-- <li class="bold"><a class="waves-effect waves-cyan " href="ayuda"><i class="material-icons">help_outline</i><span class="menu-title" data-i18n="">Ayuda</span></a></li> -->

        <!-- Menú de términos y condiciones -->
        <!-- <li class="navigation-header"><a class="navigation-header-text">Legal </a><i class="navigation-header-icon material-icons">more_horiz</i></li> -->
        <!-- <li class="bold"><a class="waves-effect waves-cyan " href="condiciones-uso"><span class="menu-title" data-i18n="">Condiciones de Uso</span></a></li> -->
        <!-- <li class="bold"><a class="waves-effect waves-cyan " href="politica-privacidad"><span class="menu-title" data-i18n="">Política de Privacidad</span></a></li> -->
        <!-- <li class="bold"><a class="waves-effect waves-cyan " href="terminos-condiciones"><span class="menu-title" data-i18n="">Terminos y condiciones</span></a></li> -->
      </ul>
      <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
    </aside>