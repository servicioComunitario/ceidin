@extends('layouts.app')

@section('css')
	<!-- iCheck -->
    <link href="{{ asset('css/iCheck/skins/flat/green.css') }}" rel="stylesheet">
	<!-- DateRangerPicker -->
	<link href="{{ asset('css/datepicker/daterangepicker.css') }}" rel="stylesheet">
@endsection

@section('contenido')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">
			<h1 class="">Editar Alumno</h1>
		</div>
	</div>
    @include('alumno._form', ['alumno' => $alumno])
@endsection

@section('js')
	<!-- iCheck -->
    <script src="{{ asset('js/iCheck/icheck.min.js') }}">"</script>
    <!-- DateRangerPicker -->
	<script src="{{ asset('js/datepicker/moment.min.js') }}"></script>
	<script src="{{ asset('js/datepicker/daterangepicker.js') }}""></script>
	<!-- Edicion -->
	<script src="{{ asset('js/alumno/edit.js') }}"></script>
@stop

