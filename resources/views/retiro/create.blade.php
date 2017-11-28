@extends('layouts.app')

@section('css')
	<!-- iCheck -->
    <link href="{{ asset('css/iCheck/skins/flat/green.css') }}" rel="stylesheet">
@endsection

@section('contenido')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">
			<h1 class="">Solicitar Retiro</h1>
		</div>
	</div>
	@include('retiro._form', ['alumnos' => $alumnos])
@endsection

@section('js')
	<!-- iCheck -->
    <script src="{{ asset('js/iCheck/icheck.min.js') }}">"</script>
@endsection



