          </div>
        </div>
      </div>
    </div>
    <!-- END: Page Main-->

    <!-- BEGIN: Footer-->

    <div id="intro">
        <div class="row">
            <div class="col s12">
                <div id="img-modal" class="modal white">
                    <div class="modal-content">
                        <div class="bg-img-div"></div>
                        <p class="modal-header right modal-close">
                            Cerrar guía <span class="right"><i class="material-icons right-align">clear</i></span>
                        </p>
                        <div class="carousel carousel-slider center intro-carousel">
                            <div class="carousel-fixed-item center middle-indicator">
                                <div class="left">
                                    <button class="movePrevCarousel middle-indicator-text btn btn-flat purple-text waves-effect waves-light btn-prev">
                                        <i class="material-icons">navigate_before</i> <span class="hide-on-small-only">ATRAS</span>
                                    </button>
                                </div>

                                <div class="right">
                                    <button class=" moveNextCarousel middle-indicator-text btn btn-flat purple-text waves-effect waves-light btn-next">
                                        <span class="hide-on-small-only">SIGUIENTE</span> <i class="material-icons">navigate_next</i>
                                    </button>
                                </div>
                            </div>
                            <div class="carousel-item slide-1">
                                <img src="<?php echo base_url(); ?>assets/css/images/gallery/intro-slide-1.png" alt="" class="responsive-img animated fadeInUp slide-1-img" style="width: 150px;">
                                <h5 class="intro-step-title mt-7 center animated fadeInUp">Bienvenido/a a <?php echo $this->session->userdata('usuario_nombre'); ?></h5>
                                <p class="intro-step-text mt-5 animated fadeInUp">En este entorno podrás gestionar las
                                    horas de entrada y de salida de tus empleados. Ademas, podrás añadir locales o tiendas
                                    y los empleados que haya en ellas.</p>
                                <p class="intro-step-text mt-5 animated fadeInUp">Recuerda: los registros/historial de tus empleados se guardarán durante 4 años. </p>
                            </div>
                            <div class="carousel-item slide-2">
                                <img src="<?php echo base_url(); ?>assets/css/images/gallery/intro-features.png" alt="" class="responsive-img slide-2-img" style="width: 150px;">
                                <h5 class="intro-step-title mt-7 center">1. Comienza agregando tu Establecimiento</h5>
                                <p class="intro-step-text mt-5">El primer paso será añadir a la plataforma tu tienda o local.</p>

                                <p class="intro-step-text mt-5">Para eso, dirigete a la <b>pestaña "<a href="establecimientos">Establecimientos</a>"</b> y dale a <b>Agrear nuevo</b>.<br>
                                Una vez dentro, deberas de añadir la informacion de tu tienda o local.</p>

                                <h5 class="intro-step-title mt-7 center">2. Despues, agrega Empleados</h5>
                                <p class="intro-step-text mt-5">Una vez tengas el establecimiento creado, deberas de <b>añadir empleados y asignarles su horario</b> para que estos,
                                   puedan registrar la hora de entrada y de salida.</p>

                                <p class="intro-step-text mt-5">Para eso, entra dentro del establecimiento y toca el boton "<b>Agregar empleado</b>".<br>
                                Rellena la informacion del empleado, asignale un horario y ¡listo!</p>

                            </div>
                            <div class="carousel-item slide-3">
                                <!--<img src="<?php echo base_url(); ?>assets/css/images/gallery/intro-app.png" alt="" class="responsive-img slide-1-img">-->
                                <h5 class="intro-step-title mt-7 center">¡Tu cuenta es Gratis!</h5>
                                <p class="intro-step-text mt-5">Si necesitas más, puedes actualizar el plan de tu cuenta en cualquier momento.</p>
                                <div class="col s12">
                                    <div class="row">
                                        <div class="plans-container">
                                            <div class="col s12 m6 14">
                                              <div class="card hoverable animate fadeLeft">
                                                <div class="card-image gradient-45deg-light-blue-cyan waves-effect">
                                                  <div class="card-title">BÁSICO</div>
                                                  <div class="price">
                                                    <sup>€</sup>4.95
                                                    <sub>/mes</sub>
                                                  </div>
                                                  <div class="price-desc">Free 1 month</div>
                                                </div>
                                                <div class="card-content">
                                                  <ul class="collection">
                                                    <li class="collection-item">500 emails</li>
                                                    <li class="collection-item">Unlimited data</li>
                                                    <li class="collection-item">1 users</li>
                                                    <li class="collection-item">First 15 day free</li>
                                                  </ul>
                                                </div>
                                                <div class="card-action center-align">
                                                  <button class="waves-effect waves-light gradient-45deg-indigo-purple gradient-shadow btn">Select
                                                    Plan</button>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col s12 m6 14">
                                              <div class="card z-depth-1 hoverable animate fadeUp">
                                                <div class="card-image gradient-45deg-red-pink waves-effect">
                                                  <div class="card-title">PROFESSIONAL</div>
                                                  <div class="price">
                                                    <sup>$</sup>29
                                                    <sub>/mo</sub>
                                                  </div>
                                                  <div class="price-desc">Most Popular</div>
                                                </div>
                                                <div class="card-content">
                                                  <ul class="collection">
                                                    <li class="collection-item">2000 emails</li>
                                                    <li class="collection-item">Unlimited data</li>
                                                    <li class="collection-item">10 users</li>
                                                    <li class="collection-item">First 30 day free</li>
                                                  </ul>
                                                </div>
                                                <div class="card-action center-align">
                                                  <button class="waves-effect waves-light gradient-45deg-indigo-purple gradient-shadow btn">Select
                                                    Plan</button>
                                                </div>
                                              </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                              <!--  <h5 class="intro-step-title mt-7 center">Plan Recomendado</h5>
                                <h5 class="intro-step-title mt-5 center">4.95 €/mes</h5>
                                <div class="row">
                                    <div class="col m5 offset-m1 s12">
                                        <ul class="feature-list left-align">
                                            <li><i class="material-icons">check</i> Gestión hasta de 3 empleados</li>
                                            <li><i class="material-icons">check</i> Añadir 2 Establecimientos</li>
                                            <li><i class="material-icons">check</i> Lista de tareas para tus empleados</li>
                                        </ul>
                                    </div>
                                    <div class="col m6 s12">
                                        <ul class="feature-list left-align">
                                            <li><i class="material-icons">check</i>Contacts Application</li>
                                            <li><i class="material-icons">check</i>Full Calendar</li>
                                            <li><i class="material-icons">check</i> Ecommerce Application</li>
                                        </ul>
                                    </div>
                                    <div class="row">
                                        <div class="col s12 center">
                                            <button class="get-started btn waves-effect waves-light gradient-45deg-purple-deep-orange mt-3 modal-close">Get
                                                Started</button>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="page-footer footer footer-static footer-dark gradient-45deg-indigo-purple gradient-shadow navbar-border navbar-shadow">
      <div class="footer-copyright">
        <div class="container"><span>&copy; 2019 - <a href="https://verificar.me" target="_blank">{{ config('app.name') }}</a> Derechos reservados.</span><span class="right hide-on-small-only"><a href="https://verificar.me/ayuda">¿Necesitas ayuda?</a></span></div>
      </div>
    </footer>

    <!-- END: Footer-->
    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url(); ?>assets/css/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="<?php echo base_url(); ?>assets/css/vendors/chartjs/chart.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/css/vendors/chartist-js/chartist.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/css/vendors/chartist-js/chartist-plugin-tooltip.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/css/vendors/chartist-js/chartist-plugin-fill-donut.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN THEME  JS-->
    <script src="<?php echo base_url(); ?>assets/css/js/plugins.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/css/js/custom/custom-script.js" type="text/javascript"></script>
    <!-- END THEME  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="<?php echo base_url(); ?>assets/css/js/scripts/dashboard-modern.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/css/js/scripts/intro.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>
