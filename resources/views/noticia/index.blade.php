@extends('layouts.app')

@section('css')
	<!-- Datatables -->
	<link href={{ asset('datatable/datatables.net-bs/css/dataTables.bootstrap.min.css') }} rel="stylesheet"/>
	<link href={{ asset('datatable/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }} rel="stylesheet"/>
	<link href={{ asset('datatable/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }} rel="stylesheet"/>
	<link href={{ asset('datatable/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }} rel="stylesheet"/>
	<link href={{ asset('datatable/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }} rel="stylesheet"/>

@endsection

@section('contenido')	
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
            <h1 class="">Listado de Noticias</h1>
        </div>
    </div>

    @include('noticia._modal')
    @include('noticia._table', ['noticias' => $noticias])
@endsection

@section('js')
	<!-- Moment -->
	<script src="{{ asset('js/datepicker/moment.min.js') }}"></script>

	<!-- Datatables -->
	<script src={{ asset('datatable/datatables.net/js/jquery.dataTables.min.js') }}></script>
	<script src={{ asset('datatable/datatables.net-bs/js/dataTables.bootstrap.min.js') }}></script>
	<script src={{ asset('datatable/datatables.net-buttons/js/dataTables.buttons.min.js') }}></script>
	<script src={{ asset('datatable/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}></script>
	<script src={{ asset('datatable/datatables.net-buttons/js/buttons.flash.min.js') }}></script>
	<script src={{ asset('datatable/datatables.net-buttons/js/buttons.html5.min.js') }}></script>
	<script src={{ asset('datatable/datatables.net-buttons/js/buttons.print.min.js') }}></script>
	<script src={{ asset('datatable/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}></script>
	<script src={{ asset('datatable/datatables.net-keytable/js/dataTables.keyTable.min.js') }}></script>
	<script src={{ asset('datatable/datatables.net-moment/js/datetime-moment.js') }}></script>
	<script src={{ asset('datatable/datatables.net-responsive/js/dataTables.responsive.min.js') }}></script>
	<script src={{ asset('datatable/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}></script>
	<script src={{ asset('datatable/datatables.net-scroller/js/dataTables.scroller.min.js') }}></script>
	<script src={{ asset('datatable/jszip/dist/jszip.min.js') }}></script>

	<script src={{ asset('js/noticia/index.js') }}></script>
@endsection

