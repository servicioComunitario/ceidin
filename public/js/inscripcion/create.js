$(document).ready(function() {
	
	$('#alumno_cedula').blur(function(event) {
		var cedula= $(this).val();
        var input_alumno = $('.alumno');

		if (!cedula.length){
			return false;
		}

        $.get('/alumno/' + cedula +'/buscar', function (data) {
        	console.log(data);
	        let code = data.code;
	        let alumno = data.alumno;

	        if(!code){
				input_alumno.val('');
				
	        	return false;
	        }

			input_alumno.attr('disabled', 'true');
			$('#alumno_nombre').val(alumno.datos_basico.nombre);
			$('#alumno_apellido').val(alumno.datos_basico.apellido);
			$('#alumno_nombre2').val(alumno.datos_basico.nombre2);
			$('#alumno_apellido2').val(alumno.datos_basico.apellido2);
			$('#alumno_fecha_nacimiento').val(alumno.datos_basico.fecha_nacimiento);
			$('#alumno_direccion').val(alumno.datos_basico.direccion);
			$('#alumno_nacionalidad').val(alumno.datos_basico.nacionalidad);
			$('#alumno_lugar_nacimiento').val(alumno.lugar_nacimiento);
			$('#alumno_procedencia').val(alumno.procedencia);
			$('#alumno_nivel').val(alumno.nivel);

		    $('#alumno_sexo').find('option').each( function( index, option){
		        if( $( option ).val() == alumno.sexo ){
		            $('#alumno_sexo').prop('selectedIndex', index);
		        }
		    });

		    $('#cedula_representante').val(alumno.representante.datos_basico.cedula).attr('readonly', 'true');
      	});
    });
});