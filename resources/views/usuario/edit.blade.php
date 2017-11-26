@extends('layouts.app')

@section('css')
    <!-- iCheck -->
    <link href="{{ asset('css/iCheck/skins/flat/green.css') }}" rel="stylesheet">

@endsection

@section('contenido')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">
			<h1 class="">Editar Usuario</h1>
		</div>
	</div>
    @include('usuario._form', ['usuario' => $usuario, 'roles', $roles])
@endsection

@section('js')
    <!-- iCheck -->
    <script src="{{ asset('js/iCheck/icheck.min.js') }}">"</script>

@endsection

