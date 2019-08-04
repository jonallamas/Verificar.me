<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>

<div class="breadcrumbs-dark pb-2 pt-1" id="breadcrumbs-wrapper">
  	<!-- Search for small screen-->
  	<div class="container">
    	<div class="row">
      		<div class="col s10 m6 l6">
        		<h5 class="breadcrumbs-title mt-0 mb-0">Empresas</h5>
        		<ol class="breadcrumbs mb-0">
          			<li class="breadcrumb-item"><a>Panel</a></li>
          			<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>empresas">Empresas</a></li>
          			<li class="breadcrumb-item active"><a>Editar</a></li>
        		</ol>
      		</div>
			<div class="col s2 m6 l6">
				<a href="<?php echo base_url(); ?>empresas" class="btn waves-effect waves-light breadcrumbs-btn right default btn-small" ><i class="material-icons left">keyboard_arrow_left</i> <span class="hide-on-small-onl">Volver</span></a>
            </div>
    	</div>
  	</div>
</div>

<div  class="col s12 l12">
	<div class="container">
		<div class="section">
			<div class="card card card-default scrollspy" style="overflow: visible !important;">
			    <div class="card-content">
			      	<h4 class="card-title">Modificar empresa</h4>
			      	<form action="<?php echo base_url(); ?>empresas/guardar" class="formValidate" method="post" id="f_form" name="f_form">
			        	<div class="row">
			          		<div class="input-field col m6 s12">
			            		<input id="f_empresa_nombre" name="f_empresa_nombre" type="text" value="<?php echo $empresa->nombre; ?>" data-error=".errorTxt1">
			            		<label for="f_empresa_nombre">Nombre</label>
			            		<div class="errorTxt1"></div>
			          		</div>
			          		<div class="input-field col m3 s12">
								<input id="f_empresa_dni" name="f_empresa_dni" type="text" value="<?php echo $empresa->dni; ?>" data-error=".errorTxt2">
								<label for="f_empresa_dni">DNI</label>
								<div class="errorTxt2"></div>
                    		</div>
                    		<div class="input-field col m3 s12">
								<input id="f_empresa_nif" name="f_empresa_nif" type="text" value="<?php echo $empresa->nif; ?>" data-error=".errorTxt3">
								<label for="f_empresa_nif">NIF</label>
								<div class="errorTxt3"></div>
                    		</div>
			        	</div>
	          		<div class="row">
	            		<div class="input-field col s12 right-align">
	            			<input type="hidden" id="f_empresa_codigo" name="f_empresa_codigo" value="<?php echo $empresa->codigo; ?>">
	            			<a href="<?php echo base_url(); ?>empresas" class="waves-effect btn-flat">Cancelar</a>
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