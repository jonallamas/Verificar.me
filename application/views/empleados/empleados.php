<div class="content-wrapper-before gradient-45deg-indigo-purple"></div>

<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
  	<!-- Search for small screen-->
  	<div class="container">
    	<div class="row">
      		<div class="col s10 m6 l6">
        		<h5 class="breadcrumbs-title mt-0 mb-0">Empleados</h5>
        		<ol class="breadcrumbs mb-0">
          			<li class="breadcrumb-item"><a>Panel</a></li>
          			<li class="breadcrumb-item active"><a>Empleados</a></li>
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
			<div id="Form-advance" class="card card card-default scrollspy">
			    <div class="card-content">
			      	<h4 class="card-title">Agrega un nuevo empleado</h4>
			      	<form class="col s12" action="<?php echo base_url(); ?>emprendimientos/guardar" method="post" id="" name="">
			        	<div class="row">
			          		<div class="input-field col m6 s12">
			            		<input id="first_name01" type="text">
			            		<label for="first_name01">First Name</label>
			          		</div>
			          		<div class="input-field col m6 s12">
			            		<input id="last_name" type="text">
			            		<label for="last_name">Last Name</label>
			          		</div>
			        	</div>
			        	<div class="row">
			          		<div class="input-field col s12">
				            	<input id="email5" type="email">
				            	<label for="email">Email</label>
			          		</div>
			        	</div>
			        	<div class="row">
			          		<div class="input-field col s12">
					            <input id="password6" type="password">
					            <label for="password">Password</label>
			          		</div>
			        	</div>
			        	<div class="row">
			          		<div class="input-field col s12">
			            		<textarea id="message5" class="materialize-textarea"></textarea>
			            		<label for="message">Message</label>
			          		</div>
			          		<div class="row">
			            		<div class="input-field col s12">
			              			<button class="btn cyan waves-effect waves-light right" type="submit" name="action">Crear</button>
			            		</div>
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
							<h4 class="card-title">Responsive Table</h4>
							<div class="row">
								<div class="col s12"></div>
								<div class="col s12">
									<table class="responsive-table">
										<thead>
											<tr>
												<th data-field="id">Name</th>
												<th class="mismalinea" data-field="name">Item Name</th>
												<th class="mismalinea right-align" data-field="price" width="5%">Price</th>
												<th class="right-align" data-field="total" width="5%">Total</th>
												<th data-field="status" width="1%">Status</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>Alvin</td>
												<td>Eclair</td>
												<td class="right-align">$0.87</td>
												<td class="right-align">$1.87</td>
												<td class="center-align"><a href="#"><i class="material-icons pink-text">edit</i></a></td>
											</tr>
											<tr>
												<td>Alan</td>
												<td>Jellybean</td>
												<td class="right-align">$3.76</td>
												<td class="right-align">$10.87</td>
												<td class="center-align"><a href="#"><i class="material-icons pink-text">edit</i></a></td>
											</tr>
											<tr>
												<td>Jonathan</td>
												<td>Lollipop</td>
												<td class="right-align">$7.00</td>
												<td class="right-align">$12.87</td>
												<td class="center-align"><a href="#"><i class="material-icons pink-text">edit</i></a></td>
											</tr>
											<tr>
												<td>Shannon</td>
												<td>KitKat</td>
												<td class="right-align">$9.99</td>
												<td class="right-align">$14.87</td>
												<td class="center-align"><a href="#"><i class="material-icons pink-text">edit</i></a></td>
											</tr>
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