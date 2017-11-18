$(document).ready(function() {
	$.ajaxSetup({
		url: urlGetNoticia,
		type: 'GET',
		dataType: 'json',
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
});

function getNoticia(idNoticia, primaria) {
	var noticia = null;

	$.ajax({
		data: {
			id : idNoticia,
		}
	})
	.done(function(noticia) {
		mostrarNoticia(noticia, primaria);
	});
}

function mostrarNoticia(noticia, primaria) {
	
	var modal = primaria ? $('#noticiaModalPrimario') : $('#noticiaModalSecundario'); 

	$(".mdl-titulo").text(noticia.titulo);
	$(".mdl-resumen").text(noticia.resumen);
	$(".mdl-imagen").attr('src', noticia.imagen_ruta);
	$(".mdl-imagen").attr('alt', noticia.titulo);
	$(".mdl-contenido").html(noticia.contenido);
	$(".mdl-autor").text(noticia.usuario.datos_basico.nombre + ' ' + noticia.usuario.datos_basico.apellido);
	$(".mdl-fecha").text(noticia.fecha);

	modal.modal()
		.toggle();
}

