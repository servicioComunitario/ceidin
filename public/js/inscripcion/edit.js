$(document).ready(function() {
	$('#fecha_inicio, #fecha_fin').daterangepicker({
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

	});

	$('#fecha_inicio').data('daterangepicker').setStartDate(moment($('#fecha_inicio').val(), "DD-MM-YYYY"));
	$('#fecha_fin').data('daterangepicker').setStartDate(moment($('#fecha_fin').val(), "DD-MM-YYYY"));

	$( "#fecha_inicio, #fecha_fin" ).change(function() {
		var fechaInicio = moment($('#fecha_inicio').val(), "DD-MM-YYYY").format("Y");
		var fechaFin = moment($('#fecha_fin').val(), "DD-MM-YYYY").format("Y");

		$('#nombre').val(fechaInicio+"-"+fechaFin);
	});

	$( "#fecha_inicio, #fecha_fin" ).change();
});