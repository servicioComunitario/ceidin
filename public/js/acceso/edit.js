function cambiarAcceso(chkAcceso, event) {

	event.preventDefault();
	
	var ruta     = chkAcceso.attr('ruta');
	var metodos  = chkAcceso.attr('metodos');
	var nombre   = chkAcceso.attr('nombre');
	var idRol    = chkAcceso.attr('id_rol');
	var idAcceso = chkAcceso.attr('id_acceso');

	$.ajax({
			data: {
				ruta    : ruta,
				metodos : metodos,
				nombre  : nombre,
				rol_id  : idRol,
				id      : idAcceso,
			}
		})
		.done(function(respuesta) {
			var switchery = document.querySelector('#'+chkAcceso.attr('id'));
	        
	        switchery.checked = chkAcceso.is(':checked') ? false : true;

			if (typeof Event === 'function' || !document.fireEvent) {
			    var event = document.createEvent('HTMLEvents');
			    event.initEvent('change', true, true);
			    switchery.dispatchEvent(event);
			} 
		})
		.fail(function(xhr, status, error) {
			switch(xhr.status){
				case 403:{
					$("#numError").text("403");
					$("#tituloError").text("¡Acceso Denegado!");
					$("#descripcionError").text("Usted no tiene permisos para modificar los Accesos");
					$("#iconoError").addClass('fa-lock');
				}break;

				case 404:{
					$("#numError").text("404");
					$("#tituloError").text("Recurso no localizado");
					$("#descripcionError").text("El recurso al que intenta acceder no ha podido ser encontrado.");
					$("#iconoError").addClass('fa-question');
				}break;

				case 500:{
					$("#numError").text("500");
					$("#tituloError").text("Error interno");
					$("#descripcionError").text("Ha ocurrido un error en el servidor mientras se procesaba su petición.");
					$("#iconoError").addClass('fa-bug');
				}break;

				default:{
					$("#numError").text(xhr.status);
					$("#tituloError").text(error);
					$("#descripcionError").text(error);
					$("#iconoError").addClass('fa-frown-o');
				}break;
			}

			$('.modal-error403').modal('toggle');			
		});
}

$(document).ready(function() {
	$.ajaxSetup({
		url: urlUpdate,
		type: 'PUT',
		dataType: 'json',
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});

	if($(".js-switch")[0]){
		var elementos = Array.prototype.slice.call(document.querySelectorAll(".js-switch"));
		var i = 0;
		console.log(elementos);
		elementos.forEach(function(elemento){
			if(i>9){
				new Switchery(elemento,{color:"#26B99A"})
			}
			i++;
		})
	}

	$('#tbl_accesos').DataTable( {
        order: [[ 1, "asc" ]]
    } );
});