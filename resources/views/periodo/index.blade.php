@extends('layouts.base')

@section('contenido')	
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
            <h1 class="">Listado de Periodos</h1>
        </div>
    </div>

    @include('periodo._modal')
    @include('periodo._table', ['periodos' => $periodos])
@endsection

@section('js')
	<script src={{ URL::asset('js/periodo/index.js') }}></script>
@endsection

