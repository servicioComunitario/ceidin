$(document).ready(function() {
	$('#representante_fecha_nacimiento').daterangepicker({
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

	// inicializando el select2
    $('.js-example-basic-single').select2();

    $('.js-example-basic-single').change(function(event) {
		var cedula= $(this).val();
        var input_representante = $('.representante');

		if (!cedula.length){
			// input_representante.attr('disabled', 'false');
			return false;
		}

        $.get('/datos_basico/' + cedula +'/buscar_datos_basicos', function (data) {
        	console.log(data);
	        let code = data.code;
	        let datos_basico = data.datos_basico;

	        if(!code){
				// input_representante.removeAttr('disabled');
				input_representante.val('');
				$('#representante_parentesco').focus();
	        	return false;
	        }

			input_representante.attr('disabled', 'true');
			$('#representante_cedula').val(datos_basico.cedula);
			$('#representante_nombre').val(datos_basico.nombre);
			$('#representante_apellido').val(datos_basico.apellido);
			$('#representante_nombre2').val(datos_basico.nombre2);
			$('#representante_apellido2').val(datos_basico.apellido2);
			$('#representante_fecha_nacimiento').val(datos_basico.fecha_nacimiento);
			$('#representante_parentesco').val(datos_basico.parentesco);
			$('#representante_ocupacion').val(datos_basico.ocupacion);
			$('#representante_direccion').val(datos_basico.direccion);
			$('#representante_nacionalidad').val(datos_basico.nacionalidad);
			$('#representante_telefono_celular').val(datos_basico.telefono_celular);
			$('#representante_telefono_fijo').val(datos_basico.telefono_fijo);

		    $('#representante_sexo').find('option').each( function( index, option){
		        if( $( option ).val() == datos_basico.sexo ){
		            $('#representante_sexo').prop('selectedIndex', index);
		        }
		    });
      	});
    });

/*
	$('#representante_cedula').blur(function(event) {
		var cedula= $(this).val();
        var input_representante = $('.representante');

		if (!cedula.length){
			// input_representante.attr('disabled', 'false');
			return false;
		}

        $.get('/datos_basico/' + cedula +'/buscar_datos_basicos', function (data) {
        	console.log(data);
	        let code = data.code;
	        let datos_basico = data.datos_basico;

	        if(!code){
				// input_representante.removeAttr('disabled');
				input_representante.val('');
				$('#representante_parentesco').focus();
	        	return false;
	        }

			input_representante.attr('disabled', 'true');
			$('#representante_nombre').val(datos_basico.nombre);
			$('#representante_apellido').val(datos_basico.apellido);
			$('#representante_nombre2').val(datos_basico.nombre2);
			$('#representante_apellido2').val(datos_basico.apellido2);
			$('#representante_fecha_nacimiento').val(datos_basico.fecha_nacimiento);
			$('#representante_parentesco').val(datos_basico.parentesco);
			$('#representante_ocupacion').val(datos_basico.ocupacion);
			$('#representante_direccion').val(datos_basico.direccion);
			$('#representante_nacionalidad').val(datos_basico.nacionalidad);
			$('#representante_telefono_celular').val(datos_basico.telefono_celular);
			$('#representante_telefono_fijo').val(datos_basico.telefono_fijo);

		    $('#representante_sexo').find('option').each( function( index, option){
		        if( $( option ).val() == datos_basico.sexo ){
		            $('#representante_sexo').prop('selectedIndex', index);
		        }
		    });
      	});
    });
*/
});