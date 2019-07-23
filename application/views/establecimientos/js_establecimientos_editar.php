<script>
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
          url: base_url+"establecimientos/obtener_poblaciones",
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
</script>