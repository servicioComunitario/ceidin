@extends('layouts.app')

@section('contenido')
<div class="container body">
    <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
            <div class="col-middle">
                <div class="text-center text-center">
                    <h1 class="error-number text-danger">403</h1>
                    <h2>¡Acceso Denegado!</h2>
                    <p>
                        <b>Usted no tiene permisos para entrar a esta página.</b>
                    </p>
                    <div class="mid_center">
                        <i class="fa fa-lock fa-5x text-danger" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
</div>
@endsection