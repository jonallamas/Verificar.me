function mostrar_info(mostrarID, ocultarID){
	if($("#"+ocultarID).is(":visible")){
		$("#"+ocultarID).fadeOut('fast', function(){
			$("#"+mostrarID).fadeIn('fast');
		});
	}else{
		$("#"+mostrarID).fadeOut('fast', function(){
			$("#"+ocultarID).fadeIn('fast');
		});
	}	
}

$(window).on('load',function(){
    var preLoder = $("#preloader");
    preLoder.fadeOut(1000);

    // var backtoTop = $('.back-to-top')
    // backtoTop.fadeOut(100);
});