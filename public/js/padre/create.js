$(document).ready(function() {
	$('#padre_fecha_nacimiento').daterangepicker({
		locale: {
	        format: "DD-MM-YYYY",
	        separator: " - ",
	        daysOfWeek: [
	            "Do",
	            "Lu",
	            "Ma",
	            "Mi",
	            "Ju",
	            "Vi",
	            "Sá"
	        ],
	        "monthNames": [
	            "Enero",
	            "Febrero",
	            "Marzo",
	            "Abril",
	            "Mayo",
	            "Junio",
	            "Julio",
	            "Agosto",
	            "Septiembre",
	            "Octubre",
	            "Noviembre",
	            "Diciembre"
	        ],
	        firstDay: 1
	    },
		singleDatePicker : true,
		singleClasses    : "picker_3",
		startDate        : new Date(),

	});

	$('#padre_cedula').blur(function(event) {
		var cedula= $(this).val();
        var input_padre = $('.padre');

		if (!cedula.length){
			// input_padre.attr('disabled', 'true');
			return false;
		}

        $.get('/datos_basico/' + cedula +'/buscar_datos_basicos', function (data) {
        	console.log(data);
	        let code = data.code;
	        let datos_basico = data.datos_basico;

	        if(!code){
				// input_padre.removeAttr('disabled');
				input_padre.val('');
				$('#padre_grado_inscruccion').focus();
	        	return false;
	        }

			input_padre.attr('disabled', 'true');
			$('#padre_nombre').val(datos_basico.nombre);
			$('#padre_apellido').val(datos_basico.apellido);
			$('#padre_nombre2').val(datos_basico.nombre2);
			$('#padre_apellido2').val(datos_basico.apellido2);
			$('#padre_fecha_nacimiento').val(datos_basico.fecha_nacimiento);
			$('#padre_parentesco').val(datos_basico.parentesco);
			$('#padre_ocupacion').val(datos_basico.ocupacion);
			$('#padre_direccion').val(datos_basico.direccion);
			$('#padre_nacionalidad').val(datos_basico.nacionalidad);
			$('#padre_telefono_celular').val(datos_basico.telefono_celular);
			$('#padre_telefono_fijo').val(datos_basico.telefono_fijo);

		    $('#padre_sexo').find('option').each( function( index, option){
		        if( $( option ).val() == datos_basico.sexo ){
		            $('#padre_sexo').prop('selectedIndex', index);
		        }
		    });
      	});
    });

});