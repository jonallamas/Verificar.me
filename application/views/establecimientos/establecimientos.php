<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>

<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
  	<!-- Search for small screen-->
  	<div class="container">
    	<div class="row">
      		<div class="col s10 m6 l6">
        		<h5 class="breadcrumbs-title mt-0 mb-0">Establecimientos</h5>
        		<ol class="breadcrumbs mb-0">
          			<li class="breadcrumb-item"><a>Panel</a></li>
          			<li class="breadcrumb-item active"><a>Establecimientos</a></li>
        		</ol>
      		</div>
			<div class="col s2 m6 l6">
				<button type="button" id="helpBtn" class="btn waves-effect waves-light breadcrumbs-btn right" onclick="mostrar_info('modulo_carga', 'modulo_lista');"><span class="hide-on-small-onl">Nuevo</span><i class="material-icons right">add</i></button>
            </div>
    	</div>
  	</div>
</div>

<div  class="col s12 l12" id="modulo_carga">
	<div class="container">
		<div class="section">
			<div class="card card card-default scrollspy" style="overflow: visible !important;">
			    <div class="card-content">
			      	<h4 class="card-title">Agrega un nuevo establecimiento</h4>
			      	<form action="<?php echo base_url(); ?>establecimientos/guardar" method="post" id="f_form" name="f_form">
			        	<div class="row">
			          		<div class="input-field col m4 s12">
			            		<input id="f_establecimiento_nombre" name="f_establecimiento_nombre" type="text">
			            		<label for="f_establecimiento_nombre">Nombre</label>
			          		</div>
			          		<div class="input-field col m8 s12">
                      <input id="f_establecimiento_direccion" name="f_establecimiento_direccion" type="text">
                      <label for="f_establecimiento_direccion">Dirección</label>
                    </div>
			        	</div>
                <div class="row">
                  <div class="col m5 s12">
                    <label for="f_establecimiento_provincia">Provincia</label>
                    <select class="browser-default" name="f_establecimiento_provincia" id="f_establecimiento_provincia">
                      <option value="" disabled selected>Seleccione una opción</option>
                      <?php foreach ($provincias as $provincia) { ?>
                      <option value="<?php echo $provincia->provinciaid; ?>"><?php echo $provincia->provincia; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col m5 s12">
                    <label for="f_establecimiento_poblacion">Población</label>
                    <select disabled class="browser-default" name="f_establecimiento_poblacion" id="f_establecimiento_poblacion">
                      <option value="" selected>Seleccione una opción</option>
                    </select>
                  </div>
                  <div class="col m2 s12">
                      <label for="f_establecimiento_cod_postal">Cód. postal</label>
                      <input name="f_establecimiento_cod_postal" id="f_establecimiento_cod_postal" type="text">
                    </div>
                </div>
	          		<div class="row">
	            		<div class="input-field col s12">
	              			<button class="btn cyan waves-effect waves-light right" type="submit">Crear</button>
	            		</div>
	          		</div>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>

<div class="col s12 l12" id="modulo_lista">
	<div class="container">
		<div class="section">
			<div class="card">
				<div class="card-content">
					<p class="caption mb-0"><strong>OPCIONAL</strong> - Tables are a nice way to organize a lot of data. We provide a few utility classes to help you style your table as easily as possible. In addition, to improve mobile experience, all tables on mobile-screen widths are centered automatically.</p>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m12 l12">
					<div id="responsive-table" class="card card card-default scrollspy">
						<div class="card-content">
							<h4 class="card-title">Lista de establecimientos</h4>
							<div class="row">
								<div class="col s12"></div>
								<div class="col s12">
									<table class="responsive-table" id="tabla_establecimientos">
										<thead>
											<tr>
												<th>id</th>
												<th class="mismalinea">Nombre</th>
												<th width="1%">Provincia</th>
                        <th width="1%">Población</th>
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

<script>
	// Scripts de Validación
	$(document).ready(function() 
	{
	    $("#f_establecimiento_provincia").change(function()
	    {
	      if(this.value == 0)
	      {
	        $("#f_establecimiento_poblacion").val(0);
	        $("#f_establecimiento_poblacion").prop('disabled', 'disabled');
	      }
	      else
	      {
	        $.ajax({
	          type: "POST",
	          data: {
	            'provincia_id'    : this.value
	          },
	          url: "establecimientos/obtener_poblaciones",
	          success: function(data) {
	            $("#f_establecimiento_poblacion").html('<option value="" disabled selected="selected">Seleccione una opción</option>');
	            
	            var poblaciones = jQuery.parseJSON(data);
	            
	            $.each(poblaciones, function(key, value) {
	              $('#f_establecimiento_poblacion').append('<option value="'+poblaciones[key].poblacionid+'">'+poblaciones[key].poblacion+'</option>');
	            });
	          }
	        });
	        
	        $("#f_establecimiento_poblacion").val(0);
	        $("#f_establecimiento_poblacion").prop('disabled', false);
	      }
	    }); 

		tabla = $('#tabla_establecimientos').DataTable({
			"autoWidth": false,
			"language": {
				"url": base_url+"scripts/script_tablas/spanish.json"
			},
			serverSide: true,
			columns: [
				{ data: 'id',				'visible':false, 	'orderable': true, 	'searchable': false },
				// { data: 'icono', 			'visible':true, 	'orderable': false, 'searchable': false },
				{ data: 'nombre',		'visible':true, 	'orderable': true, 	'searchable': true },		
		        { data: 'provincia_nombre',   'visible':true,   'orderable': true,  'searchable': true },   
		        { data: 'poblacion_nombre',   'visible':true,   'orderable': true,  'searchable': true, 'render': function(val, type, row) 
		        	{
		        		return '<span class="mismalinea">'+row.poblacion_nombre+'</span>';
		        	}
		    	},   	
				{ data: 'id', 				'visible':true, 	'orderable': false, 'searchable': false, 'render': function (val, type, row)
          			{
	            		var opciones = '<div class="mismalinea">';
						opciones += '<a href="establecimientos/establecimiento/'+row.codigo+'" class="waves-effect waves-light btn-small">Entrar</a> ';
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