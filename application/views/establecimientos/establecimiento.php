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
									<table class="responsive-table" id="page-length-option">
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

<script>
	$(document).ready(function(){
		// Tabla lista de usuarios del sistema
		var tabla_usuarios = $('.tabla_usuarios #page-length-option').DataTable({
			"autoWidth": false,
			"language": {
				"url": base_url+"scripts/script_tablas/spanish.json"
			},
			serverSide: true,
			columns: [
				{ data: 'id',				'visible':false, 	'orderable': true, 	'searchable': false },
				// { data: 'icono', 			'visible':true, 	'orderable': false, 'searchable': false },
				{ data: 'nombre_completo',		'visible':true, 	'orderable': true, 	'searchable': true },		
		        { data: 'correo',   'visible':false,   'orderable': false,  'searchable': true },	
				{ data: 'id', 				'visible':true, 	'orderable': false, 'searchable': false, 'render': function (val, type, row)
          			{
	            		var opciones = '<div class="mismalinea center-align">';
						opciones += '<button type="button" class="waves-effect waves-light btn-small cyan btnAgregarEmpleado" data-nombre="'+row.nombre_completo+'" data-id="'+row.id+'"><i class="material-icons">add</i></button> ';
	            		opciones += '</div>';

			            return opciones;
			    	}
			    }
			],
			order: [
				[ 0, 'desc' ],
			],
			ajax: {
				url: base_url+'establecimientos/lista_usuarios',
				type: 'POST'
			}
		});

		var tabla_empleados = $('.tabla_empleados #page-length-option').DataTable({
			"autoWidth": false,
			"language": {
				"url": base_url+"scripts/script_tablas/spanish.json"
			},
			serverSide: true,
			columns: [
				{ data: 'id',				'visible':false, 	'orderable': true, 	'searchable': false },
				// { data: 'icono', 			'visible':true, 	'orderable': false, 'searchable': false },
				{ data: 'nombre_completo',		'visible':true, 	'orderable': true, 	'searchable': true },		
		        // { data: 'correo',   'visible':false,   'orderable': false,  'searchable': true },	
				{ data: 'id', 				'visible':true, 	'orderable': false, 'searchable': false, 'render': function (val, type, row)
          			{
	            		var opciones = '<div class="mismalinea center-align">';
						opciones += '<button type="button" class="waves-effect waves-light btn-small cyan btnEliminar	Empleado"><i class="material-icons">add</i></button> ';
	            		opciones += '</div>';

			            return opciones;
			    	}
			    }
			],
			order: [
				[ 0, 'desc' ],
			],
			ajax: {
				url: base_url+'establecimientos/lista_empleados',
				type: 'POST'
			}
		});

		$('.tabla_usuarios #page-length-option').delegate('.btnAgregarEmpleado', 'click', function(e){
			e.preventDefault();
			let usuario_id = $(this).data('id');
			let usuario_nombre = $(this).data('nombre');
			console.log($(this).parents('tr'));
		    // var row = tabla_usuarios.row( $(this).parents('tr') );
		    // var rowNode = row.node();
		    // row.remove();
		    tabla_empleados.row.add({
		        	"id":       		 usuario_id,
			        "nombre_completo":   usuario_nombre,
			        "id":     			 "Hola"
		        }).draw().node();
			console.log('Agregar empleado');
		});
	});
</script>