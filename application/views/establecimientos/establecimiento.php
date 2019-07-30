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
			<!-- <div class="row">
				<div class="col s12">
					<div class="card card-default">
						<div class="card-content">
							<h4><?php echo $establecimiento->nombre; ?></h4>
							<pre><?php print_r($establecimiento); ?></pre>
						</div>
					</div>
				</div>
			</div> -->
			<div class="row">
				<div class="col s12 m5 l4">
					<div class="card card-default">
						<div class="card-content">
							<h4><?php echo $establecimiento->nombre; ?></h4>
							<!-- <pre><?php print_r($establecimiento); ?></pre> -->
							<div class="input-field" style="margin-top: 35px;">
			    				<label class="active">Empresa</label>
			    				<h6><?php echo $establecimiento->empresa_nombre; ?></h6>
			    			</div>
			    			<div class="input-field" style="margin-top: 35px;">
			    				<label class="active">Dirección</label>
			    				<h6><?php echo $establecimiento->direccion; ?></h6>
			    			</div>
			    			<div class="input-field" style="margin-top: 35px;">
			    				<label class="active">Población</label>
			    				<h6><?php echo $establecimiento->poblacion_nombre; ?></h6>
			    			</div>
			    			<div class="input-field" style="margin-top: 35px;">
			    				<label class="active">Provincia</label>
			    				<h6><?php echo $establecimiento->provincia_nombre; ?></h6>
			    			</div>
						</div>
					</div>
					<div class="card-alert card gradient-45deg-amber-amber">
						<div class="card-content white-text">
							<p>Recuerde que se guardará un historial del momento en que ingresa y elimina un empleado dentro del establecimiento.</p>
						</div>
					</div>
				</div>
				<div class="col s12 m7 l8">
					<div class="card card-default">
						<div class="card-content">
							<form action="" id="form_buscador_dni" class="col s12">
								<div class="input-field col m8 s12">
									<input placeholder="Busque por DNI" type="text" id="f_buscador_dni" class="validate">
									<label>Añada nuevos empleados</label>
								</div>
								<div class="input-field col m4 s12 center-align">
									<div class="input-field col s12">
										<button class="btn waves-effect waves-light" id="btnBuscarUsuario" type="submit" name="action"><i class="material-icons right">search</i> Buscar</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="card card card-default scrollspy">
						<div class="card-content">
							<h4 class="card-title">Lista de empleados</h4>
							<div class="row">
								<div class="col s12"></div>
								<div class="col s12 tabla_empleados">
									<table class="responsive-table" id="tabla_empleados">
										<thead>
											<tr>
												<th class="mismalinea">Nombre</th>
												<th width="1%">DNI</th>
												<th width="1%">Acciones</th>
											</tr>
										</thead>
										<tbody>
											<tr id="trSinDatos" class="scale-transition <?php if(count($empleados) > 0){ echo 'scale-out';} ?>" style="<?php if(count($empleados) > 0){ echo 'display: none;';} ?>">
												<th colspan="3" class="center-align">No posee ningún empleado agregado.</th>
											</tr>
											<?php if(count($empleados) > 0){ ?>
												<?php foreach ($empleados as $empleado) { ?>
													<tr id="fila_empleado_<?php echo $empleado->id; ?>">
														<th><?php echo $empleado->usuario_nombre_completo; ?></th>
														<th width="1%"><?php echo $empleado->usuario_dni; ?></th>
														<th width="1%" class="center-align mismalinea">
															<?php if($empleado->estado == 1){ ?>
																<button type="button" onclick="eliminar_empleado('<?php echo $empleado->id; ?>', '<?php echo $empleado->usuario_nombre_completo; ?>')" class="waves-effect waves-light btn-small orange darken-4"><i class="material-icons">block</i></button>
															<?php }else{ ?>
																<button type="button" onclick="activar_empleado('<?php echo $empleado->id; ?>', '<?php echo $empleado->usuario_nombre_completo; ?>')" class="waves-effect waves-light btn-small blue darken-4"><i class="material-icons">cached</i></button>
															<?php } ?>
															<button type="button" onclick="eliminar_empleado('<?php echo $empleado->id; ?>', '<?php echo $empleado->usuario_nombre_completo; ?>')" class="waves-effect waves-light red darken-4 btn-small"><i class="material-icons">delete</i></button>
														</th>
													</tr>
												<?php } ?>
											<?php } ?>
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

<style>
	hr{
		border: 0px;
		border-bottom: 1px solid #e0e0e0;
		margin: 15px 0px;
	}
	#modalBuscador img{
		width: 150px;
	}
	#modalBuscador .input-field{
		display: block;
		position: relative;
		margin-bottom: 35px;	
	}
</style>

<div id="modalBuscador" class="modal">
    <div class="modal-content">
    	<h5 style="margin-top: 0px;">Información del usuario</h5>
    	<hr>
    	<div class="row">
    		<div class="col m-4">
    			<img src="<?php echo base_url(); ?>assets/css/images/profile_user_default.png" class="responsive-img" alt="">
    		</div>
    		<div class="col m-8">
    			<div class="input-field">
    				<label class="active">Nombre y apellido</label>
    				<h6 id="modalBuscador-nombre"></h6>
    			</div>
    			<div class="input-field">
    				<label class="active">DNI</label>
    				<h6 id="modalBuscador-dni"></h6>
    			</div>
    			<div class="input-field">
    				<label class="active">Correo electrónico</label>
    				<h6 id="modalBuscador-correo"></h6>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="modal-footer">
    	<input type="hidden" id="modalBuscador-id" value="">
      	<button type="button" class="modal-action modal-close waves-effect btn-flat">Cancelar</button>
      	<button type="button" class="modal-action btn waves-effect waves-light" id="btnAgregarEmpleado">Agregar</button>
    </div>
</div>

<script>
	function eliminar_empleado(codigo, data){
		var ruta = 'empresas/eliminar';
		var texto_superior = '¿Está seguro de querer eliminar la siguiente empresa?';
		var btn_nombre = 'Eliminar';
		var btn_color = 'rojo';
		modal_action_general(codigo, data, ruta, texto_superior, btn_nombre, btn_color); 
	}

	$('#btnBuscarUsuario').on('click', function(e){
		e.preventDefault();
		$(this).prop('disabled', true);
		let dni = $('#f_buscador_dni').val();
		if(dni){
			$.ajax({
				type: 'POST',
				data: {
					'f_dni': dni
				},
				url: base_url+'usuarios/buscar_usuario_x_dni',
				success: function(data){
					let datos_usuario = jQuery.parseJSON(data);
					if(datos_usuario){
						$('#f_buscador_dni').val('');
						$('#btnBuscarUsuario').prop('disabled', false);
						$('#modalBuscador-nombre').html(datos_usuario.nombre_completo);
						$('#modalBuscador-dni').html(datos_usuario.dni);
						$('#modalBuscador-correo').html(datos_usuario.correo);
						$('#modalBuscador-id').val(datos_usuario.id);
						// console.log(datos_usuario);
						$('#modalBuscador').modal('open');
					}else{
						$('#btnBuscarUsuario').prop('disabled', false);
						M.toast({html: 'No se ha encontrado ningún usuario con ese DNI'});
					}
				}
			});
		}else{
			$('#btnBuscarUsuario').prop('disabled', false);
			M.toast({html: 'Por favor, ingrese un DNI válido'});
		}
	});

	$('#btnAgregarEmpleado').on('click', function(e){
		e.preventDefault();
		let nombre = $('#modalBuscador-nombre').html();
		let dni = $('#modalBuscador-dni').html();
		let id = $('#modalBuscador-id').val();

		$.ajax({
			type: 'POST',
			data: {
				'f_usuario_id': id,
				'f_establecimiento_id': <?php echo $establecimiento->id; ?>
			},
			url: base_url+'establecimientos/agregar_empleado',
			success: function(data){
				data = jQuery.parseJSON(data);
				console.log(data);
				if(data.error == 0){
					if($('#trSinDatos').hasClass('scale-out')){
						$('#tabla_empleados tbody').append(`<tr id="fila_empleado_${data.empleado_id}">
																<th>${nombre}</th>
																<th width="1%">${dni}</th>
																<th width="1%" class="center-align"><button type="button" onclick="eliminar_empleado('${data.empleado_id}', '${nombre}')" class="waves-effect waves-light red darken-4 btn-small"><i class="material-icons">delete</i></button></th>
															</tr>`);
					}else{
						$('#trSinDatos').addClass('scale-out').css('display', 'none');
						$('#tabla_empleados tbody').append(`<tr id="fila_empleado_${data.empleado_id}">
															<th>${nombre}</th>
															<th width="1%">${dni}</th>
															<th width="1%" class="center-align"><button type="button" onclick="eliminar_empleado('${data.empleado_id}', '${nombre}')" class="waves-effect waves-light red darken-4 btn-small"><i class="material-icons">delete</i></button></th>
														</tr>`);
							
					}
					$('#modalBuscador').modal('close');
					M.toast({html: 'Empleado agregado con éxito'});
				}else if(data.error == 1){
					$('#modalBuscador').modal('close');
					M.toast({html: 'El usuario que intenta agregar ya existe como empleado'});
				}else{
					$('#modalBuscador').modal('close');
					M.toast({html: 'No se ha podido agregar el empleado'});
				}
			}
		});

		// let count_empleados = $('#tabla_empleados tbody tr').length;
	});
</script>