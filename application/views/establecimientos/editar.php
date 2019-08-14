<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>

<div class="breadcrumbs-dark pb-2 pt-1" id="breadcrumbs-wrapper">
  	<!-- Search for small screen-->
  	<div class="container">
    	<div class="row">
      		<div class="col s10 m6 l6">
        		<h5 class="breadcrumbs-title mt-0 mb-0">Edición de establecimiento</h5>
        		<ol class="breadcrumbs mb-0">
          			<li class="breadcrumb-item"><a>Panel</a></li>
          			<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>establecimientos">Establecimientos</a></li>
          			<li class="breadcrumb-item active"><a>Editar</a></li>
        		</ol>
      		</div>
			<div class="col s2 m6 l6">
				<a href="<?php echo base_url(); ?>establecimientos" class="btn waves-effect waves-light breadcrumbs-btn right default btn-small" ><i class="material-icons left">keyboard_arrow_left</i> <span class="hide-on-small-onl">Volver</span></a>
            </div>
    	</div>
  	</div>
</div>

<div  class="col s12 l12">
	<div class="container">
		<div class="section">
			<div class="card card card-default scrollspy" style="overflow: visible !important;">
			    <div class="card-content">
			      	<h4 class="card-title">Modificar establecimiento</h4>
			      	<form action="<?php echo base_url(); ?>establecimientos/guardar" class="formValidate" method="post" id="f_form" name="f_form">
			        	<div class="row">
                            <div class="select-field col m4 s12">
                                <label for="f_establecimiento_empresa">Empresa</label>
                                <select class="browser-default" name="f_establecimiento_empresa" id="f_establecimiento_empresa" data-error=".errorTxt6">
                                    <option value="" disabled selected>Seleccione una opción</option>
                                    <?php foreach ($empresas as $empresa) { ?>
                                    <option value="<?php echo $empresa->id; ?>" <?php if($empresa->id == $establecimiento->id_empresa){ echo 'selected'; } ?>><?php echo $empresa->nombre; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="errorTxt6 mismalinea"></div>
                            </div>
			          		<div class="input-field col m4 s12">
			            		<input id="f_establecimiento_nombre" name="f_establecimiento_nombre" type="text" value="<?php echo $establecimiento->nombre; ?>" data-error=".errorTxt1">
			            		<label for="f_establecimiento_nombre">Nombre</label>
                                <div class="errorTxt1 mismalinea"></div>
			          		</div>
			          		<div class="input-field col m4 s12">
                                <input id="f_establecimiento_direccion" name="f_establecimiento_direccion" type="text" value="<?php echo $establecimiento->direccion; ?>" data-error=".errorTxt2">
                                <label for="f_establecimiento_direccion">Dirección</label>
                                <div class="errorTxt2 mismalinea"></div>
                            </div>
			        	</div>
                        <div class="row">
                            <div class="select-field col m5 s12">
                                <label for="f_establecimiento_provincia">Provincia</label>
                                <select class="error browser-default" name="f_establecimiento_provincia" id="f_establecimiento_provincia" data-error=".errorTxt3">
                                    <option value="" disabled>Seleccione una opción</option>
                                    <?php foreach ($provincias as $provincia) { ?>
                                    <option value="<?php echo $provincia->provinciaid; ?>" <?php if($provincia->provinciaid == $establecimiento->id_provincia){ echo 'selected'; } ?>><?php echo $provincia->provincia; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="errorTxt3 mismalinea"></div>
                            </div>
                            <div class="select-field col m5 s12">
                                <label for="f_establecimiento_poblacion">Población</label>
                                <select class="error browser-default" name="f_establecimiento_poblacion" id="f_establecimiento_poblacion" data-error=".errorTxt4">
                                    <option value="" disabled selected>Seleccione una opción</option>
                                    <?php foreach ($poblaciones as $poblacion) { ?>
                                    <option value="<?php echo $poblacion->poblacionid; ?>" <?php if($poblacion->poblacionid == $establecimiento->id_ciudad){ echo 'selected'; } ?>><?php echo $poblacion->poblacion; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="errorTxt4 mismalinea"></div>
                            </div>
                            <div class="col m2 s12">
                                <label for="f_establecimiento_cod_postal">Cód. postal</label>
                                <input name="f_establecimiento_cod_postal" id="f_establecimiento_cod_postal" type="text" value="<?php echo $establecimiento->id_cp; ?>" data-error=".errorTxt5">
                                <div class="errorTxt5 mismalinea"></div>
                            </div>
                        </div>
                        <div class="row">
	            		    <div class="input-field col s12 right-align">
	            			    <input type="hidden" id="f_establecimiento_id" name="f_establecimiento_id" value="<?php echo $establecimiento->codigo; ?>">
	            			    <a href="<?php echo base_url(); ?>establecimientos" class="waves-effect btn-flat">Cancelar</a>
	              			    <button class="btn waves-effect waves-light" type="submit">Modificar</button>
	            		    </div>
	          		    </div>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>

<?php echo $js_editar; ?>