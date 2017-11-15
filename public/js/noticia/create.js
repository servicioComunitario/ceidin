$(document).ready( function() {
	// Editor de Contenido de la Noticia
	$('#contenido').summernote({
		minHeight: 300, 
		height: 400,
		lang: 'es-ES',
		toolbar: [
			['style', ['style']],
			['fontsize', ['fontsize']],
			['font-style', ['bold', 'italic', 'underline', 'clear']],
			['font', ['strikethrough', 'superscript', 'subscript']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
			['height', ['height']],
			['insert', ['link', 'picture','table','hr']],
			['undo', ['undo']],
			['redo', ['redo']],
			['fullscreen', ['fullscreen']],
			['help', ['help']],
		],
	});

	//Preview de la Imagen de la Noticia
	$(document).on('change', '.btn-archivo :file', function() {
		var input = $(this),
		label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
	});

	$('.btn-archivo :file').on('fileselect', function(event, label) {

		var input = $(this).parents('.input-group').find(':text'),
		log = label;

		if( input.length ) {
			input.val(log);
		} else {
			if( log ) alert(log);
		}

	});
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#img-preview').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#imagen").change(function(){
		readURL(this);
	});

});