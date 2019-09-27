<script>
	function eliminar_establecimiento(codigo, data){
		var ruta = 'establecimientos/eliminar';
		var texto_superior = '¿Está seguro de querer eliminar el siguiente establecimiento?';
		var btn_nombre = 'Eliminar';
		var btn_color = 'rojo';
		modal_action_general(codigo, data, ruta, texto_superior, btn_nombre, btn_color);
	}
	function suspender_establecimiento(codigo, data){
		var ruta = 'establecimientos/suspender';
		var texto_superior = '¿Está seguro de querer suspender el siguiente establecimiento?';
		var btn_nombre = 'Suspender';
		var btn_color = 'naranja';
		modal_action_general(codigo, data, ruta, texto_superior, btn_nombre, btn_color);
	}
	function activar_establecimiento(codigo, data){
		var ruta = 'establecimientos/activar';
		var texto_superior = '¿Está seguro de querer activar el siguiente establecimiento?';
		var btn_nombre = 'Activar';
		var btn_color = 'azul';
		modal_action_general(codigo, data, ruta, texto_superior, btn_nombre, btn_color);
	}

	// Valicación y datatable
	$(document).ready(function()
	{
        $("#f_form").validate({
            rules: {
                f_establecimiento_empresa: {
                    required: true,
                },
                f_establecimiento_nombre: {
                    required: true,
                },
                f_establecimiento_direccion: {
                    required: true,
                },
                f_establecimiento_provincia: {
                    required: true,
                },
                f_establecimiento_poblacion: {
                    required: true,
                },
                f_establecimiento_cod_postal: {
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

	    $("#f_establecimiento_provincia").change(function(){
	      	if(this.value == 0){
		        $("#f_establecimiento_poblacion").val(0);
		        $("#f_establecimiento_poblacion").prop('disabled', 'disabled');
	      	}
	      	else{
	        	$.ajax({
					type: "POST",
					data: {
						'provincia_id'    : this.value
					},
	          		url: "establecimientos/obtener_poblaciones",
	          		success: function(data) {
	            		var poblaciones = jQuery.parseJSON(data);
	            		$("#f_establecimiento_poblacion").html('<option value="" disabled selected="selected">Seleccione una opción</option>');

	            		$.each(poblaciones, function(key, value) {
	              			$('#f_establecimiento_poblacion').append('<option value="'+poblaciones[key].poblacionid+'">'+poblaciones[key].poblacion+'</option>');
	            		});
	          		}
	        	});
		        $("#f_establecimiento_poblacion").val(0);
		        $("#f_establecimiento_poblacion").prop('disabled', false);
	      	}
	    });

	    // Tabla principal de establecimientos
		$('.tabla_establecimientos #page-length-option').DataTable({
			"responsive": true,
			"autoWidth": false,
			"language": {
				"url": base_url+"scripts/script_tablas/spanish.json"
			},
			serverSide: true,
			columns: [
				{ data: 'id',				'visible':false, 	'orderable': true, 	'searchable': false },
				// { data: 'icono', 			'visible':true, 	'orderable': false, 'searchable': false },
				{ data: 'nombre',		'visible':true, 	'orderable': true, 	'searchable': true },
		        { data: 'empresa_nombre',   'visible':true,   'orderable': true,  'searchable': true },
		        { data: 'poblacion_nombre',   'visible':true,   'orderable': true,  'searchable': true, 'render': function(val, type, row)
		        	{
		        		return '<span class="mismalinea">'+row.poblacion_nombre+'</span>';
		        	}
		    	},
		        { data: 'provincia_nombre',   'visible':true,   'orderable': true,  'searchable': true },
				{ data: 'id', 				'visible':true, 	'orderable': false, 'searchable': false, 'render': function (val, type, row)
          			{
	            		var opciones = '<div class="mismalinea center-align">';
						opciones += '<a href="establecimientos/establecimiento/'+row.codigo+'" class="waves-effect waves-light btn-small">Gestionar</a> ';
						opciones += '<a href="establecimientos/editar/'+row.codigo+'" title="Editar Establecimiento" class="waves-effect waves-light btn-small cyan"><i class="material-icons">edit</i></a> ';
						if(row.estado == 1){
							opciones += '<button type="button" title="Suspender Temporalmente" onclick="suspender_establecimiento(\''+row.codigo+'\', \''+row.nombre+'\')" class="waves-effect waves-light btn-small orange darken-4"><i class="material-icons">block</i></button> ';
						}
						if(row.estado == 2){
							opciones += '<button type="button" title="Re-Activar Establecimiento" onclick="activar_establecimiento(\''+row.codigo+'\', \''+row.nombre+'\')" class="waves-effect waves-light btn-small blue darken-4"><i class="material-icons">cached</i></button> ';
						}
						opciones += '<button type="button" title="Eliminar Establecimiento" onclick="eliminar_establecimiento(\''+row.codigo+'\', \''+row.nombre+'\')" class="waves-effect waves-light red darken-4 btn-small"><i class="material-icons">delete</i></button> ';
	            		opciones += '</div>';

			            return opciones;
			    	}
			    }
			],
			order: [
				[ 0, 'desc' ],
			],
			ajax: {
				url: 'establecimientos/lista',
				type: 'POST'
			}
		});
	});

</script>
