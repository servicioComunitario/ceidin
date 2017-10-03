@extends('layouts.base')

@section('css')
	<link href={{ URL::asset('css/daterangepicker.css') }} rel="stylesheet">
@endsection

@section('contenido')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">
			<h1 class="">Crear Periodo</h1>
		</div>
	</div>
	@include('periodo._form', ['periodo' => $periodo])
@endsection

@section('js')
	<script src={{ URL::asset('js/moment.min.js') }}></script>
	<script src={{ URL::asset('js/daterangepicker.js') }}></script>
	<script src={{ URL::asset('js/periodo/create.js') }}></script>
@stop



