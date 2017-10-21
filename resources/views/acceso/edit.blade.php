@extends('layouts.app')

@section('css')
	<!-- iCheck -->
    <link href="{{ asset('css/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- Switchery -->
    <link href="{{ asset('css/switchery/switchery.min.css') }}" rel="stylesheet">
	<!-- Datatables -->
	<link href={{ asset('datatable/datatables.net-bs/css/dataTables.bootstrap.min.css') }} rel="stylesheet"/>
	<link href={{ asset('datatable/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }} rel="stylesheet"/>
	<link href={{ asset('datatable/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }} rel="stylesheet"/>
	<link href={{ asset('datatable/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }} rel="stylesheet"/>
	<link href={{ asset('datatable/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }} rel="stylesheet"/>
@endsection

@section('contenido')
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">
			<h1 class="">Editar Accesos de {{ $rol->nombre }}</h1>
		</div>
	</div>
    
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Accesos de {{ $rol->nombre }}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="tbl_accesos" class="table table-striped table-bordered jambo_table">
                        <thead>
                            <tr>
                                <th>Métodos</th>
                                <th>Ruta</th>
                                <th>Nombre</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($accesos as $acceso)
                            <tr>
                                <td>{{ $acceso->metodos }}</td>
                                <td>{{ $acceso->ruta }}</td>
                                <td>{{ $acceso->nombre}}</td>
                                <td class="text-center">
                                    <label>
                                      <input type="checkbox" class="js-switch" @if($acceso->id) checked @endif onclick="cambiarAcceso($(this), event)" metodos="{{ $acceso->metodos }}" ruta="{{ $acceso->ruta }}" nombre="{{ $acceso->nombre }}" id_rol="{{ $rol->id }}" id="{{ 'chk'.$loop->index }}" id_acceso="{{ $acceso->id }}"/>
                                    </label>
                                </td>
                            </tr>
                            @endforeach                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-error403" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel2">Error</h4>
                </div>
                <div class="modal-body">
                        <div class="col-middle">
                            <div class="text-center text-center">
                                <h1 id="numError" class="error-number text-danger"></h1>
                                <h2 id="tituloError"></h2>
                                <p>
                                    <b id="descripcionError"></b>
                                </p>
                                <div class="">
                                    <i id="iconoError" class="fa fa-3x text-danger" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="text-center">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
	<!-- iCheck -->
    <script src="{{ asset('js/iCheck/icheck.min.js') }}"></script>
    <!-- Switchery -->
    <script src="{{ asset('js/switchery/switchery.min.js') }}">"</script>
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
	<script src={{ asset('datatable/datatables.net-responsive/js/dataTables.responsive.min.js') }}></script>
	<script src={{ asset('datatable/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}></script>
	<script src={{ asset('datatable/datatables.net-scroller/js/dataTables.scroller.min.js') }}></script>
	<script src={{ asset('datatable/jszip/dist/jszip.min.js') }}></script>
    <!-- Editar Acceso -->
    <script type="text/javascript">var urlUpdate = '{{ route('acceso.update', 0) }}';</script>
    <script src="{{ asset('js/acceso/edit.js') }}"></script>
@endsection

