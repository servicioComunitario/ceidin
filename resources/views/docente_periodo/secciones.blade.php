@extends('layouts.app')

@section('css')
	<!-- Datatables -->
	<link href={{ asset('datatable/datatables.net-bs/css/dataTables.bootstrap.min.css') }} rel="stylesheet"/>
	<link href={{ asset('datatable/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }} rel="stylesheet"/>
	<link href={{ asset('datatable/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }} rel="stylesheet"/>
	<link href={{ asset('datatable/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }} rel="stylesheet"/>
	<link href={{ asset('datatable/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }} rel="stylesheet"/>

@endsection

@section('contenido')	
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
            <h1 class="">Listado Secciones</h1>
        </div>
    </div>

    <div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12">
    		<div class="x_panel">
    			<div class="x_title">
    				<h2>Docentes</h2>
    				<ul class="nav navbar-right panel_toolbox">
    					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
    				</ul>
    				<div class="clearfix"></div>
    			</div>
    			<div class="x_content">
    				<table id="tbl_roles" class="table table-striped table-bordered jambo_table">
    					<thead>
    						<tr>
    							<th>Seccion</th>
    							<th>Docente</th>
    							<th>Turno</th>
    							<th>Accion</th>
    						</tr>
    					</thead>
    					<tbody>
    						@foreach($docentes_periodo as $docente_periodo)
    						<tr>
    							<td>{{ $docente_periodo->seccion }}</td>
    							<td>{{ $docente_periodo->docente->datosBasico->nombre}} {{ $docente_periodo->docente->datosBasico->apellido}}</td>
    							<td>{{ $docente_periodo->turno }}</td>
    							<td class="text-center">
    								<a href={{ route('admin.inscripcion.pdf', [$docente_periodo->docente_id, $docente_periodo->periodo_id]) }} class="btn btn-primary btn-xs" title="PDF"><i class="fa fa-search"></i></a>
    							</td>
    						</tr>
    						@endforeach                        
    					</tbody>
    				</table>
    			</div>
    		</div>
    	</div>
    </div>
@endsection

@section('js')
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

	<script src={{ asset('js/periodo/index.js') }}></script>
@endsection

