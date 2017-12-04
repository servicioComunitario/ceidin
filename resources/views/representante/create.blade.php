@extends('layouts.app')

@section('css')
	<!-- iCheck -->
    <link href="{{ asset('css/iCheck/skins/flat/green.css') }}" rel="stylesheet">
	<!-- DateRangerPicker -->
	<link href="{{ asset('css/datepicker/daterangepicker.css') }}" rel="stylesheet">
	{{-- select 2 --}}
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('contenido')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">
			<h1 class="">Registrar representante</h1>
		</div>
	</div>
	@include('representante._form', ['representante' => $representante])
@endsection

@section('js')
	<!-- iCheck -->
    <script src="{{ asset('js/iCheck/icheck.min.js') }}">"</script>
    <!-- DateRangerPicker -->
	<script src="{{ asset('js/datepicker/moment.min.js') }}"></script>
	<script src="{{ asset('js/datepicker/daterangepicker.js') }}""></script>
	{{-- select 2 --}}
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<!-- Creacion -->
	<script src="{{ asset('js/representante/create.js') }}"></script>
@stop



