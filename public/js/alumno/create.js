$(document).ready(function() {
	$('#alumno_fecha_nacimiento').daterangepicker({
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


	$('#representante_cedula').blur(function(event) {
		var cedula= $(this).val();
        var input_representante = $('.representante');

		if (!cedula.length){
			// input_representante.attr('disabled', 'true');
			return false;
		}

        $.get('/representante/' + cedula +'/buscar_representante', function (data) {
	        let code = data.code;
	        let representante = data.representante;

	        if(!code){
				// input_representante.removeAttr('disabled');
				input_representante.val('');
			$('#representante_nombre').focus();
	        	return false;
	        }

			input_representante.attr('disabled', 'true');
			$('#representante_nombre').val(representante.nombre);
			$('#representante_apellido').val(representante.apellido);
			$('#representante_nombre2').val(representante.nombre2);
			$('#representante_apellido2').val(representante.apellido2);
			$('#representante_fecha_nacimiento').val(representante.fecha_nacimiento);
			$('#representante_parentesco').val(representante.parentesco);
			$('#representante_ocupacion').val(representante.ocupacion);
			$('#representante_direccion').val(representante.direccion);
			$('#representante_nacionalidad').val(representante.nacionalidad);
			$('#representante_telefono_celular').val(representante.telefono_celular);
			$('#representante_telefono_fijo').val(representante.telefono_fijo);

		    $('#representante_sexo').find('option').each( function( index, option){
		        if( $( option ).val() == representante.sexo ){
		            $('#representante_sexo').prop('selectedIndex', index);
		        }
		    });
      	});
    });

	$('#padre_cedula, #madre_cedula').blur(function(event) {
		var cedula= $(this).val();
		var padre = '';

	    if ( $(this).attr('data-sexo') == 'M' ) {
	    	padre = 'padre';
	    } else if ( $(this).attr('data-sexo') == 'F' ) {
	    	padre = 'madre';	    	
	    } else {
	    	return false;
	    }

	    var input_padre = $('.' + padre);

		if (!cedula.length){
			// input_padre.attr('disabled', 'true');
			return false;
		}

	    $.get('/padre/' + cedula +'/buscar_padre', function (data) {
			console.log(data);
	        
	        let code = data.code;
	        let data_padre = data.padre;

	        if(!code){
				// input_padre.removeAttr('disabled');
				input_padre.val('');
	        	return false;
	        }

			input_padre.attr('disabled', 'true');
			$('#'+ padre +'_grado_instruccion').val(data_padre.grado_instruccion);
			$('#'+ padre +'_nombre').val(data_padre.nombre);
			$('#'+ padre +'_apellido').val(data_padre.apellido);
			$('#'+ padre +'_nombre2').val(data_padre.nombre2);
			$('#'+ padre +'_apellido2').val(data_padre.apellido2);
			$('#'+ padre +'_fecha_nacimiento').val(data_padre.fecha_nacimiento);
			$('#'+ padre +'_parentesco').val(data_padre.parentesco);
			$('#'+ padre +'_ocupacion').val(data_padre.ocupacion);
			$('#'+ padre +'_direccion').val(data_padre.direccion);
			$('#'+ padre +'_nacionalidad').val(data_padre.nacionalidad);
			$('#'+ padre +'_telefono_celular').val(data_padre.telefono_celular);
			$('#'+ padre +'_telefono_fijo').val(data_padre.telefono_fijo);

		    $('#'+ padre +'_sexo').find('option').each( function( index, option){
		        if( $( option ).val() == data_padre.sexo ){
		            $('#'+ padre +'_sexo').prop('selectedIndex', index);
		        }
		    });

			if (data_padre.difunto == 1) {
				$('#'+ padre +'_difunto_si').removeAttr('disabled');
				$('#'+ padre +'_difunto_si').prop("checked");
				$('#'+ padre +'_difunto_si').closest('div').addClass('checked')
				console.log('es difunto');
			} else {
				$('#'+ padre +'_difunto_no').removeAttr('disabled');
				$('#'+ padre +'_difunto_no').prop("checked");
				$('#'+ padre +'_difunto_no').closest('div').addClass('checked')
				console.log('no es difunto');
			}

	  	});
	});

        
});
