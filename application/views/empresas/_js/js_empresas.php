<script>
	function eliminar_empresa(codigo, data){
		var ruta = 'empresas/eliminar';
		var texto_superior = '¿Está seguro de querer eliminar la siguiente empresa?';
		var btn_nombre = 'Eliminar';
		var btn_color = 'rojo';
		modal_action_general(codigo, data, ruta, texto_superior, btn_nombre, btn_color);
	}
	function suspender_empresa(codigo, data){
		var ruta = 'empresas/suspender';
		var texto_superior = '¿Está seguro de querer suspender la siguiente empresa?';
		var btn_nombre = 'Suspender';
		var btn_color = 'naranja';
		modal_action_general(codigo, data, ruta, texto_superior, btn_nombre, btn_color);
	}
	function activar_empresa(codigo, data){
		var ruta = 'empresas/activar';
		var texto_superior = '¿Está seguro de querer activar la siguiente empresa?';
		var btn_nombre = 'Activar';
		var btn_color = 'azul';
		modal_action_general(codigo, data, ruta, texto_superior, btn_nombre, btn_color);
	}

	// Valicación y datatable
	$(document).ready(function()
	{
		$("#f_form").validate({
		    rules: {
		      	f_empresa_nombre: {
		        	required: true,
		      	},
		      	f_empresa_dni: {
		        	required: true,
		      	},
		      	f_empresa_nif: {
			        required: true,
		      	}
		    },
		    errorElement: 'div',
		    errorPlacement: function (error, element) {
		      	var placement = $(element).data('error');
		      	if (placement) {
		        	$(placement).append(error)
		      	} else {
		        	error.insertAfter(element);
		      	}
		    }
		});

		tabla = $('#page-length-option').DataTable({
			"autoWidth": false,
			"language": {
				"url": base_url+"scripts/script_tablas/spanish.json"
			},
			serverSide: true,
			columns: [
				{ data: 'id',				'visible':false, 	'orderable': true, 	'searchable': false },
				// { data: 'icono', 			'visible':true, 	'orderable': false, 'searchable': false },
				{ data: 'nombre',		'visible':true, 	'orderable': true, 	'searchable': true },
		        { data: 'dni',   'visible':true,   'orderable': false,  'searchable': true },
		        { data: 'nif',   'visible':true,   'orderable': false,  'searchable': true },
				{ data: 'id', 				'visible':true, 	'orderable': false, 'searchable': false, 'render': function (val, type, row)
          			{
	            		var opciones = '<div class="mismalinea center-align">';
						// opciones += '<a href="empresas/empresa/'+row.codigo+'" class="waves-effect waves-light btn-small">Administrar</a> ';
						opciones += '<a href="empresas/editar/'+row.codigo+'" title="Editar Empresa" class="waves-effect waves-light btn-small cyan"><i class="material-icons">edit</i></a> ';
						if(row.estado == 1){
							opciones += '<button type="button" title="Suspender Temporalmente" onclick="suspender_empresa(\''+row.codigo+'\', \''+row.nombre+'\')" class="waves-effect waves-light btn-small orange darken-4"><i class="material-icons">block</i></button> ';
						}
						if(row.estado == 2){
							opciones += '<button type="button" title="Re-Activar Empresa" onclick="activar_empresa(\''+row.codigo+'\', \''+row.nombre+'\')" class="waves-effect waves-light btn-small blue darken-4"><i class="material-icons">cached</i></button> ';
						}
						opciones += '<button type="button" title="Eliminar Empresa" onclick="eliminar_empresa(\''+row.codigo+'\', \''+row.nombre+'\')" class="waves-effect waves-light red darken-4 btn-small"><i class="material-icons">delete</i></button> ';
	            		opciones += '</div>';

			            return opciones;
			    	}
			    }
			],
			order: [
				[ 0, 'desc' ],
			],
			ajax: {
				url: 'empresas/lista',
				type: 'POST'
			}
		});
	});
</script>
