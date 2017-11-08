$(document).ready(function() {
	$("#tbl_padres").DataTable().order([0, 'desc']).draw();

	// moviendo el boton para agregar un nuevo padre
	let $btnNewOld = $('.btn-new');
	let $btnNew = $btnNewOld.clone();
	$btnNewOld.remove();
	$('#tbl_padres_filter').before($btnNew);
});