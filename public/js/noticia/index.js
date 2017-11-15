$(document).ready(function() {
	$.fn.dataTable.moment('DD/MM/YYYY HH:mm:ss');
	$("#tbl_noticias").DataTable().order([0, 'asc']).draw();
});