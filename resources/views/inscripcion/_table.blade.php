<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Inscripciones Escolares</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="tbl_periodos" class="table table-striped table-bordered jambo_table">
                    <thead>
                        <tr>
                            <th>Representante</th>
                            <th>Cedula</th>
                            <th>Alumno</th>
                            <th>Estatus</th>
                            <th>Fecha</th>
                            <th style="width: 80px;" class="text-center">
                                <a href={{ route('inscripcion.create') }} class="btn btn-success btn-xs" title="Crear">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inscripciones as $inscripcion)
			            <tr>
			                <td>{{ $inscripcion->alumno->representante->nombre .' '.$inscripcion->alumno->representante->apellido }}</td>
			                <td>{{ $inscripcion->alumno->representante->cedula }}</td>
			                <td>{{ $inscripcion->alumno->nombre .' '. $inscripcion->alumno->nombre }}</td>
			                <td>{{ $inscripcion->estatus }}</td>
			                <td>{{ $inscripcion->fecha }}</td>
                        </tr>
                        @endforeach                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
