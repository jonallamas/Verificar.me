<script>
	function eliminar_empleado(id, data){
		var ruta = 'empleados/eliminar';
		var texto_superior = '¿Está seguro de querer eliminar el siguiente empleado?';
		var btn_nombre = 'Eliminar';
		var btn_color = 'rojo';
		modal_action_general(id, data, ruta, texto_superior, btn_nombre, btn_color); 
	}
	function suspender_empleado(id, data){
		var ruta = 'empleados/suspender';
		var texto_superior = '¿Está seguro de querer suspender el siguiente empleado?';
		var btn_nombre = 'Suspender';
		var btn_color = 'naranja';
		modal_action_general(id, data, ruta, texto_superior, btn_nombre, btn_color); 
	}
	function activar_empleado(id, data){
		var ruta = 'empleados/activar';
		var texto_superior = '¿Está seguro de querer activar el siguiente empleado?';
		var btn_nombre = 'Activar';
		var btn_color = 'azul';
		modal_action_general(id, data, ruta, texto_superior, btn_nombre, btn_color); 
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
					window.location = data.url;
				}else if(data.error == 1){
					$('#modalBuscador').modal('close');
					M.toast({html: 'El usuario que intenta agregar ya existe como empleado'});
				}
			}
		});
	});
</script>