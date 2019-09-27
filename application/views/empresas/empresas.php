<div class="content-wrapper-before gradient-45deg-indigo-blue"></div>

<div class="breadcrumbs-dark pb-2 pt-1" id="breadcrumbs-wrapper">
  	<!-- Search for small screen-->
  	<div class="container">
    	<div class="row">
      		<div class="col s10 m6 l6">
        		<h5 class="breadcrumbs-title mt-0 mb-0">Administración de empresas</h5>
        		<ol class="breadcrumbs mb-0">
          			<li class="breadcrumb-item"><a>Panel</a></li>
          			<li class="breadcrumb-item active"><a>Empresas</a></li>
        		</ol>
      		</div>
			<div class="col s2 m6 l6 right-align">
				<?php if($cuenta->cant_empresas < $cuenta->suscripcion_cant_empresas){ ?>
				<button type="button" class="btn waves-effect btn-small waves-light breadcrumbs-btn" onclick="mostrar_info('modulo_carga', 'modulo_lista');"><span class="hide-on-small-onl">Nuevo</span><i class="material-icons right">add</i></button>
				<?php } ?>
            </div>
    	</div>
  	</div>
</div>

<?php if($cuenta->cant_empresas < $cuenta->suscripcion_cant_empresas){ ?>
<div  class="col s12 l12" id="modulo_carga">
	<div class="container">
		<div class="section">
			<div class="card card card-default scrollspy" style="overflow: visible !important;">
			    <div class="card-content">
			      	<h4 class="card-title">Agrega una nueva empresa</h4>
			      	<form action="<?php echo base_url(); ?>empresas/guardar" class="formValidate" method="post" id="f_form" name="f_form">
			        	<div class="row">
			          		<div class="input-field col m6 s12">
			            		<input id="f_empresa_nombre" name="f_empresa_nombre" type="text" data-error=".errorTxt1">
			            		<label for="f_empresa_nombre">Nombre</label>
			            		<div class="errorTxt1"></div>
			          		</div>
			          		<div class="input-field col m3 s12">
								<input id="f_empresa_dni" name="f_empresa_dni" type="text"  data-error=".errorTxt2">
								<label for="f_empresa_dni">DNI</label>
								<div class="errorTxt2"></div>
                    		</div>
                    		<div class="input-field col m3 s12">
								<input id="f_empresa_nif" name="f_empresa_nif" type="text"  data-error=".errorTxt3">
								<label for="f_empresa_nif">NIF</label>
								<div class="errorTxt3"></div>
                    		</div>
			        	</div>
		          		<div class="row">
		            		<div class="input-field col s12 right-align">
		              			<button type="button" class="waves-effect btn-flat" onclick="mostrar_info('modulo_carga', 'modulo_lista');">Cancelar</button>
		              			<button class="btn waves-effect waves-light" type="submit">Crear</button>
		            		</div>
		          		</div>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<div class="col s12 l12 section-data-tables" id="modulo_lista">
	<div class="container">
		<div class="section">
			<?php if($cuenta->cant_empresas >= $cuenta->suscripcion_cant_empresas){ ?>
			<div class="card-alert card colormenupers">
				<div class="card-content white-text">
					<p><i class="material-icons">error</i> ATENCIÓN: Ha llegado al máximo de establecimientos posibles por crear. Si desea seguir agregando más, deberá <a href="#">actualizar su suscripción</a>.</p>
				</div>
			</div>
			<?php } ?>
			<div class="row">
				<div class="col s12 m12 l12">
					<div id="responsive-table" class="card card card-default scrollspy">
						<div class="card-content">
							<h4 class="card-title">Lista de empresas</h4>
							<div class="row">
								<div class="col s12"></div>
								<div class="col s12">
									<table class="display" id="page-length-option">
										<thead>
											<tr>
												<th>id</th>
												<th width="2%" ><strong>Nombre</strong></th>
												<th width="1%"><strong>DNI</strong></th>
												<th width="1%"><strong>NIF</strong></th>
												<th width="1%" class="center-align"><strong>Acciones</strong></th>
											</tr>
										</thead>
										<tbody>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo $js_empresas; ?>
