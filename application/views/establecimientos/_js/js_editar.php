<script>
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
                url: base_url+"establecimientos/obtener_poblaciones",
                success: function(data) {
                    var poblaciones = jQuery.parseJSON(data);
                    $("#f_establecimiento_poblacion").html('<option value="" disabled selected>Seleccione una opción</option>');

                    $.each(poblaciones, function(key, value) {
                        $('#f_establecimiento_poblacion').append('<option value="'+poblaciones[key].poblacionid+'">'+poblaciones[key].poblacion+'</option>');
                    });
                }
            });
            $("#f_establecimiento_poblacion").val(0);
            $("#f_establecimiento_poblacion").prop('disabled', false);
        }
    });

    // Valicación
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
    });
</script>