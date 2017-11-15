@extends('layouts.app')

@section('css')
    <!-- iCheck -->
    <link href="{{ asset('css/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- SummerNote -->
    <link href="{{ asset('summernote/summernote.css') }}" rel="stylesheet">

    <link href="{{ asset('css/noticia/create.css') }}" rel="stylesheet">
@endsection

@section('contenido')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
            <h1 class="">Noticia</h1>
        </div>
    </div>
    @include('noticia._form', ['noticia' => $noticia])    
@endsection

@section('js')
    <!-- iCheck -->
    <script src="{{ asset('js/iCheck/icheck.min.js') }}">"</script>
    <!-- SummerNote -->
    <script src="{{ asset('summernote/summernote.js') }}">"</script>
    <script src="{{ asset('summernote/lang/summernote-es-ES.js') }}">"</script>

    <script src="{{ asset('js/noticia/create.js') }}">"</script>
@stop