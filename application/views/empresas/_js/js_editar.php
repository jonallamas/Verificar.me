<script>
	// Valicación
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
	});
</script>