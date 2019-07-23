<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>

<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
  	<!-- Search for small screen-->
  	<div class="container">
    	<div class="row">
      		<div class="col s10 m6 l6">
        		<h5 class="breadcrumbs-title mt-0 mb-0">Administración de empleados</h5>
        		<ol class="breadcrumbs mb-0">
          			<li class="breadcrumb-item"><a>Panel</a></li>
          			<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>establecimientos">Establecimientos</a></li>
          			<li class="breadcrumb-item active"><a>Establecimiento</a></li>
        		</ol>
      		</div>
			<div class="col s2 m6 l6 right-align">
				<a href="<?php echo base_url(); ?>establecimientos" class="btn waves-effect waves-light breadcrumbs-btn right btn-small default" ><i class="material-icons left">keyboard_arrow_left</i> <span class="hide-on-small-onl">Volver</span></a>
            </div>
    	</div>
  	</div>
</div>

<div class="col s12 m12 section-data-tables">
	<div class="container">
		<div class="section">
			<div class="row">
				<div class="col s12">
					<div class="card card-default">
						<div class="card-content">
							<h4><?php echo $establecimiento->nombre; ?></h4>
							<pre><?php print_r($establecimiento); ?></pre>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m6">
					<div id="responsive-table" class="card card card-default scrollspy">
						<div class="card-content">
							<h4 class="card-title">Lista de usuarios</h4>
							<div class="row">
								<div class="col s12"></div>
								<div class="col s12 tabla_usuarios">
									<table class="display" id="page-length-option">
										<thead>
											<tr>
												<th>id</th>
												<th class="mismalinea">Nombre</th>
												<th width="1%">Correo</th>
												<th width="1%">Acciones</th>
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
				<div class="col s12 m6">
					<div id="responsive-table" class="card card card-default scrollspy">
						<div class="card-content">
							<h4 class="card-title">Lista de empleados</h4>
							<div class="row">
								<div class="col s12"></div>
								<div class="col s12 tabla_empleados">
									<table class="responsive-table" id="page-length-option">
										<thead>
											<tr>
												<th>id</th>
												<th class="mismalinea">Nombre</th>
												<th width="1%">Acciones</th>
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

<?php echo $js_establecimientos; ?>