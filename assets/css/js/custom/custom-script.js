/*================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 5.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================

NOTE:
------
PLACE HERE YOUR OWN JS CODES AND IF NEEDED.
WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR CUSTOM SCRIPT IT'S BETTER LIKE THIS. */

function modal_action_general(codigo, data, ruta, texto_superior, btn_nombre, btn_color){
    $('#modalActionGeneral_texto').html(texto_superior);
    $('#modalActionGeneral_data').html(data);

    var btnColor;
    switch(btn_color){
        case 'rojo':
            btnColor = 'red darken-4';
            break;
        case 'azul':
            btnColor = 'blue darken-4';
            break;
        case 'naranja':
            btnColor = 'orange darken-4';
            break;
    }
    
    $('#modalActionGeneral_btn').removeClass().addClass('modal-action btn waves-effect waves-light '+btnColor).html(btn_nombre);
    $('#modalActionGeneral').modal('open');
    $('#modalActionGeneral_btn').click(function(){
        $('#modalActionGeneral').modal('close');
        window.location = base_url+ruta+'/'+codigo;
    })
}

function alerta_abm(num_alerta){
    switch(num_alerta) {
        case 1:
            M.toast({html: '¡Creación exitosa!'})
            break;
        case 2:
            M.toast({html: '¡Edición exitosa!'})
            break;
        case 3:
            M.toast({html: '¡Suspención exitosa!'})
            break;
        case 4:
            M.toast({html: '¡Activación exitosa!'})
            break;
        case 9:
            M.toast({html: '¡Eliminación exitosa!'})
            break;

        case 11:
            M.toast({html: '¡Ups! Problemas con la creación'})
            break;
        case 22:
            M.toast({html: '¡Ups! Problemas con la edición'})
            break;
        case 33:
            M.toast({html: '¡Ups! Problemas con la suspención'})
            break;
        case 44:
            M.toast({html: '¡Ups! Problemas con la activación'})
            break;
        case 99:
            M.toast({html: '¡Ups! Problemas con la eliminación'})
            break;
    }
}