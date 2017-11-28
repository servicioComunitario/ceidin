@extends('layouts.app')

@section('css')
	<!-- iCheck -->
    <link href="{{ asset('css/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <link href={{ asset('css/select2.min') }} rel="stylesheet"/>
@endsection

@section('contenido')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">
			<h1 class="">Registrar Docente</h1>
		</div>
	</div>
	@include('colaboracion._form', ['colaboracion' => $colaboracion])
@endsection

@section('js')
	<script src={{ asset('js/select2.min.js') }}></script>
	<script src={{ asset('js/docente/index.js') }}></script>
	<!-- iCheck -->
    <script src="{{ asset('js/iCheck/icheck.min.js') }}">"</script>
@endsection



