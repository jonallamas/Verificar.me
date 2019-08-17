<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Document Title -->
    <title><?php echo $titulo; ?> | Gestión de Horas de Trabajo</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>assets/homeweb/img/favicon.png">

    <!-- CSS Files -->
    <!--==== Google Fonts ====-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,500,600" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homeweb/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homeweb/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homeweb/plugins/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homeweb/plugins/Magnific-Popup/magnific-popup.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homeweb/css/style.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homeweb/css/responsive.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/homeweb/css/custom.css">
</head>

<body>

    <!-- Main header -->
    <header class="header">
        <!-- Start Header Navbar-->
        <div class="main-header">
            <div class="main-menu-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-6">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="<?php echo base_url(); ?>">
                                    <img src="<?php echo base_url(); ?>assets/homeweb/img/logo.svg" data-rjs="2" alt="Verificar.me">
                                </a>
                            </div>
                            <!-- End of Logo -->
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-4 col-6 menu-button">
                            <div class="menu--inner-area clearfix">
                                <div class="menu-wraper">
                                    <nav>
                                        <!-- Header-menu -->
                                        <div class="header-menu dosis">
                                            <ul>
                                                <li class="active"><a href="https://verificar.me">Inicio</a></li>
                                                <li><a href="#features">¿Para que sirve?</a></li>
                                                <li><a href="#app">Capturas APP</a></li>
                                                <li><a href="#pricing">Precios</a></li>
                                                <!-- <li><a href="#">Blog</a>
                                                    <ul>
                                                        <li><a href="blog.html">Blog Posts</a></li>
                                                        <li><a href="blog-details.html">single Post</a></li>
                                                    </ul>
                                                </li> -->
                                            </ul>
                                        </div>
                                        <!-- End of Header-menu -->
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-5 d-md-block d-none">
                            <div class="urgent-call text-right">
                               <strong><a href="https://verificar.me/panel" class="btn">Registro - Iniciar sesión</a></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Navbar-->
    </header>
    <!-- End of Main header -->

    <!-- home banner area -->
    <div class="banner-area-inner">
        <div class="banner-inner-area banner-area1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <!-- banner text -->
                        <div class="banner-text-inner">
                            <div class="banner-shape-wrap">
                                <div class="banner-shape-inner">
                                  <img src="<?php echo base_url(); ?>assets/homeweb/img/banner/shaps1.png" alt="" class='shape shape1 rotate3d'>
                                  <img src="<?php echo base_url(); ?>assets/homeweb/img/banner/shaps2.png" alt="" class='shape shape2 rotate2d'>
                                  <img src="<?php echo base_url(); ?>assets/homeweb/homeweb/img/banner/shaps3.png" alt="" class='shape shape3 rotate-2d'>
                                  <img src="<?php echo base_url(); ?>assets/homeweb/homeweb/img/banner/shaps4.png" alt="" class='shape shape4 rotate3d'>
                                  <img src="<?php echo base_url(); ?>assets/homeweb/img/banner/shaps6.png" alt="" class='shape shape6 rotate-2d'>
                                  <img src="<?php echo base_url(); ?>assets/homeweb/img/banner/shaps7.png" alt="" class='shape shape7 rotate3d'>
                                </div>
                            </div>

                            <h1>Gestión de Horas en Trabajadores</h1>
                            <p>Nuestra Aplicación para empresas te permitirá gestionar las horas de los trabajadores con total comodidad. Desde la hora de entrada hasta la hora de salida gracias al simple fichaje con el móvil.</p>
                            <a href="https://verificar.me/panel/registro" class="btn">Crear cuenta</a>
                            <a href="https://verificar.me/panel/ingresar" class="btn">Iniciar sesión</a>
                        </div>
                        <!-- banner text -->
                    </div>
                    <div class="col-lg-5 offset-lg-1 col-md-4 offse-xl-2">
                        <!-- banner image-->
                        <div class="banner-image">
                            <img src="<?php echo base_url(); ?>assets/homeweb/img/banner/mockup.png" alt="">
                        </div>
                        <!--End of banner image-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of home banner area -->

    <!-- feature area -->
    <section class="pb-110" id='features'>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-8">
                    <!-- section title -->
                    <div class="section-title text-center">
                        <h2>APP Gestión de Horas</h2>
                        <p>El sistema estará <b>disponible las 24 horas los 365 días del año</b>. Si eres gerente, es tan sencillo como crearte una cuenta y agregar los empleados. Tras eso, ellos deberán de fichar la entrada y salida a través de nuestra aplicación movil.</p>
                    </div>
                    <!-- End of section title -->
                </div>
            </div>

        </div><!--/.container-->
    </section><!-- End of feature area -->

<!-- Contenedor Empleados -->
    <section class="pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-5">
                    <!-- user ineract text -->
                    <div class="user-interact-inner">
                        <div class="interact-icon">
                            <img src="<?php echo base_url(); ?>assets/homeweb/img/icons/solution1.svg" class="svg" alt="">
                        </div>
                        <h2>Plataforma de Gestión para Gerentes</h2>
                        <p>
                            Gestiona y exporta los registros de tus empleados, sus horarios asignados con su ficha de entrada y de salida con total comodidad.
                        </p>
                        <a href="https://verificar.me/panel/registro" class="btn">Pruebalo ahora 15 días gratis</a>
                    </div>
                    <!--End of user ineract text -->
                </div>
                <div class="col-lg-7 col-sm-7">
                    <!-- user interact image -->
                    <div class="user-interact-image type2">
                        <img src="<?php echo base_url(); ?>assets/homeweb/img/feature/user-interact2.png"  alt="">
                    </div>
                    <!-- End of user interact image -->
                </div>
            </div>
        </div>
    </section>
    <!-- interact user -->
    <!-- interact user -->
    <section class="bg-2 pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-sm-7">
                    <!-- user interact image -->
                    <div class="user-interact-image">
                        <img src="<?php echo base_url(); ?>assets/homeweb/img/feature/user-interact.png"  alt="">
                    </div>
                    <!-- End of user interact image -->
                </div>
                <div class="col-lg-5 col-sm-5">
                    <!-- user ineract text -->
                    <div class="user-interact-inner">
                        <div class="interact-icon">
                            <img src="<?php echo base_url(); ?>assets/homeweb/img/icons/teamwork.svg" class="svg" alt="">
                        </div>
                        <h2>Plataforma de Gestión para Empleados</h2>
                        <p>
                            Accede al sistema para observar las horas trabajadas y tus movimientos en las entradas y salidas del trabajo con total facilidad.
                        </p>
                        <a href="https://verificar.me/panel/" class="btn">Empieza ahora</a>
                    </div>
                    <!--End of user ineract text -->
                </div>
            </div>
        </div>
    </section>
    <!-- interact user -->
    <!-- Counter up area -->
    <section class="border-top pt-120 pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <!-- single counetr -->
                    <div class="single-counter text-center">
                        <span class="counter">14789</span>
                        <p>Empresas</p>
                    </div><!-- single counetr -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <!-- single counetr -->
                    <div class="single-counter text-center">
                        <span class="counter">10652</span>
                        <p>Descargas de APP</p>
                    </div><!-- single counetr -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <!-- single counetr -->
                    <div class="single-counter text-center">
                        <span class="counter">7654</span>
                        <p>Valoraciones</p>
                    </div><!-- single counetr -->
                </div>
                <div class="col-md-3 col-sm-6">
                    <!-- single counetr -->
                    <div class="single-counter text-center">
                        <span class="counter">29578</span>
                        <p>Visitas Mensuales</p>
                    </div><!-- single counetr -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.End of Counter up area -->





    <!-- app video -->
    <section class="app-video">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- why bottle video -->
                    <div class="theme-video-wrap">
                        <a href="https://www.youtube.com/watch?v=SZEflIVnhH8" class="video-btn" data-popup="video"><i class="fa fa-play"></i></a>
                    </div>
                    <!-- end of why bottle video -->
                </div>
            </div>
        </div>
    </section>
    <!-- End of why bottol water -->

    <!-- app screen -->
    <section class="pt-120 pb-115" id='app'>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-8">
                    <!-- section title -->
                    <div class="section-title text-center">
                        <h2>Nuestra Plataforma</h2>
                        <h5>Accesible a traves del ordenador, movil y tablet.</h5>
                    </div>
                    <!-- End of section title -->
                </div>
            </div>
        </div>
        <div class="app-scrin-inner">
            <div class="app-carousel-inner">
                <div class="app-carousel owl-carousel">
                    <!-- slingle app image -->
                    <div class="single-app-image">
                        <img src="<?php echo base_url(); ?>assets/homeweb/img/feature/app-img.png" data-rjs="2" alt="">
                    </div>
                    <!-- slingle app image -->

                    <!-- slingle app image -->
                    <div class="single-app-image">
                        <img src="<?php echo base_url(); ?>assets/homeweb/img/feature/app-img2.png" data-rjs="2" alt="">
                    </div>
                    <!-- slingle app image -->

                    <!-- slingle app image -->
                    <div class="single-app-image">
                        <img src="<?php echo base_url(); ?>assets/homeweb/img/feature/app-img3.png" data-rjs="2" alt="">
                    </div>
                    <!-- slingle app image -->

                    <!-- slingle app image -->
                    <div class="single-app-image">
                        <img src="<?php echo base_url(); ?>assets/homeweb/img/feature/app-img4.png" data-rjs="2" alt="">
                    </div>
                    <!-- slingle app image -->

                    <!-- slingle app image -->
                    <div class="single-app-image">
                        <img src="<?php echo base_url(); ?>assets/homeweb/img/feature/app-img5.png" data-rjs="2" alt="">
                    </div>
                    <!-- slingle app image -->
                </div>
            </div>
        </div>
    </section>
    <!-- End of app screen -->

    <!-- app pricing plan -->
      <section class="pb-90" id='pricing'>
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-md-12 col-lg-8">
                      <!-- section title -->
                      <div class="section-title text-center">
                          <h2>Planes y Precios</h2>
                          <h5>Precios competentes enfocados a<br> las pequeñas-medias empresas.</h5>
                      </div>
                      <!-- End of section title -->
                  </div>
              </div>
              <div class="row">
                  <?php foreach ($planes as $plan) { ?>
                  <div class="col-md-6 col-lg-4">
                      <!--Single price plan -->
                      <div class="single-price-plan <?php if($plan->url == 'pro'){ echo 'active'; } ?> text-center">
                          <div class="single-price-top">
                              <h4><?php echo $plan->nombre; ?></h4>
                              <span><?php echo $plan->precio; ?>€</span>
                          </div>
                          <div class="single-price-body">
                              <div class="price-list">
                                  <ul>
                                      <li>
                                          <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                          <?php if($plan->cant_empresas == 1){ ?>
                                          <?php echo $plan->cant_empresas; ?> empresa
                                          <?php }else{ ?>
                                          <?php echo $plan->cant_empresas; ?> empresas
                                          <?php } ?>
                                      </li>
                                      <li>
                                          <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                          <?php if($plan->cant_establecimientos == 1){ ?>
                                          <?php echo $plan->cant_establecimientos; ?> establecimiento
                                          <?php }else{ ?>
                                          <?php echo $plan->cant_establecimientos; ?> establecimientos
                                          <?php } ?>
                                      </li>
                                      <li>
                                          <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                          <?php if($plan->cant_empleados == 1){ ?>
                                          <?php echo $plan->cant_empleados; ?> empleado x establecimiento
                                          <?php }else{ ?>
                                          <?php echo $plan->cant_empleados; ?> empleados x establecimiento
                                          <?php } ?>
                                      </li>
                                      <li>
                                          <?php if($plan->url == 'pro' || $plan->url == 'ultra'){ ?>
                                          <span><i class="fa fa-check" aria-hidden="true"></i></span>
                                          <?php }else{ ?>
                                          <span><i class="fa fa-times" aria-hidden="true"></i></span>
                                          <?php } ?>
                                          Soporte 24h
                                      </li>
                                  </ul>
                              </div>
                              <a href="<?php echo base_url(); ?>suscripcion/registro/<?php echo $plan->url; ?>" class="btn">Adquirir</a>
                          </div>
                      </div>
                      <!--end of Single price plan -->
                  </div>
                  <?php } ?>
              </div>
          </div>
      </section>
      <!-- End of app pricing plan -->



    <footer class="footer">
        <div class="footerbg">
        <img src="<?php echo base_url(); ?>assets/homeweb/img/footer-bg.png" alt="">
        </div>
        <div class="footer-top pt-120 pb-110">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <!-- footer widget -->
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/homeweb/img/logo.svg" alt=""></a>
                            </div>
                            <p>Plataforma para el registro de horas de trabajadores. Acceso para gerentes y empleados a registros a traves del ordenador, tablet o movil.</p>
                            <!-- footer social area -->
                            <div class="footer-social-area">
                                <ul class="social-icons social-icons-light nav">
                                    <li><a href="#" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                            <!-- End of footer social area -->
                        </div>
                        <!--End of footer widget -->
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <!-- widget header -->
                            <div class="widget-header">
                                <h5>Dónde estamos</h5>
                            </div>
                            <!-- widget header -->
                            <div class="widget-body">
                                <ul class="address-list">
                                    <li>
                                        <span><i class="fa  fa-phone-square"></i></span>
                                        <a href="tel:+34946754604">+34 946 754 604</a>
                                    </li>
                                    <li>
                                        <span><i class="fa  fa-envelope"></i></span>
                                        <a href="mailto:contacto@verificar.me">contacto@verificar.me</a>
                                    </li>
                                    <li>
                                        <span><i class="fa  fa-map"></i></span>
                                        C/ Licenciado Poza 31,
										<br>48011 Bilbao, España.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <!-- widget header -->
                            <div class="widget-header">
                                <h5>Nosotros</h5>
                            </div>
                            <!-- widget header -->
                        </div>

                        <div class="widget-body">
                            <div class="extra-link">
                                <div class="link-left">
                                    <ul>
                                        <li><a href="<?php echo base_url(); ?>panel/">Iniciar sesión</a></li>
                                        <li><a href="<?php echo base_url(); ?>app/">Descargar APP</a></li>
                                        <li><a href="<?php echo base_url(); ?>faq/">Preguntas Frecuentes</a></li>
										                    <li><a href="<?php echo base_url(); ?>contacto/">Contacto</a></li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="footer-widget">
                            <div class="widget-body">
                                <div class="twetter-post-inner">
                                    <div class="footer-post-details">
                                        @Verificar.me ¡Ya estamos aquí! Para celebrarlo, ¡las <strong>nuevas cuentas tendran 15 días de suscripcion gratis</strong>!. <br><a href="http://yhdj58.tp8/JK">http://yhdj58.tp8/JK</a>
                                    </div>
                                    <div class="twetter-post">
                                        <span><i class="fa fa-twitter"></i></span>
                                        Verificar.me - Ago 12, 2019
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-text text-center">
                <p><a href="<?php echo base_url(); ?>terminos-condiciones.php">Términos y Condiciones</a>  |  <a href="<?php echo base_url(); ?>politica-privacidad.php">Política Privacidad</a>  |  <a href="<?php echo base_url(); ?>app">Descargar App</a>   |  <a href="<?php echo base_url(); ?>opinion">Envía tu opinión</a><br><br>
                  © 2019 <a href="https://verificar.me">Verificar.me</a> - Derechos reservados | by <a href="https://pixelfactory.es">P.F</a></p>
            </div>
        </div>

    </footer>

    <!-- back to top -->
    <div class="back-to-top">
        <a href="#"><i class="fa fa-chevron-up"></i></a>
    </div>
    <!-- back to top -->


    <!-- JS Files -->
    <script src="<?php echo base_url(); ?>assets/homeweb/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/homeweb/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/homeweb/plugins/waypoints/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/homeweb/plugins/parsley/parsley.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/homeweb/plugins/parallax/parallax.js"></script>
    <script src="<?php echo base_url(); ?>assets/homeweb/plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/homeweb/js/menu.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/homeweb/plugins/Magnific-Popup/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/homeweb/plugins/waypoints/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/homeweb/js/scripts.js"></script>
    <script src="<?php echo base_url(); ?>assets/homeweb/js/custom.js"></script>

</body>
</html>
