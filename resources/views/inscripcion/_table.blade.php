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
			                <td>
                                {{ $inscripcion->alumno->representante->nombre .' '.$inscripcion->alumno->representante->apellido }}
                            </td>
			                <td>{{ $inscripcion->alumno->representante->cedula }}</td>
			                <td>{{ $inscripcion->alumno->nombre .' '. $inscripcion->alumno->nombre }}</td>
			                <td>{{ $inscripcion->estatus }}</td>
			                <td>{{ $inscripcion->fecha }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-xs" title="Eliminar" data-toggle="modal" data-target="#modal_eliminacion" onclick="$('#id_eliminar').val('{{ $inscripcion->id }}')">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                                <a href={{ route('inscripcion.edit', $inscripcion->id) }} class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        @endforeach                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
