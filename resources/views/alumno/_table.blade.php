<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Alumnos </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="tbl_alumnos" class="table table-striped table-bordered jambo_table">
                    <thead>
                        <tr>
                            <th>Nombre(s)</th>
                            <th>Apellido(s)</th>
                            <th>Cedula</th>
                            <th>Celular</th>
                            
                            <th style="width: 80px;" class="text-center th-opciones">
                                <a href={{ route('alumno.create') }} class="btn btn-success btn-xs btn-new" title="Crear">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumnos as $alumno)
                        <tr>
                            <td>{{ $alumno->nombre.' '.$alumno->nombre2 }}</td>
                            <td>{{ $alumno->apellido.' '.$alumno->apellido2 }}</td>
                            <td>{{ $alumno->cedula }}</td>
                            <td>{{ $alumno->telefono_celular }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-xs" title="Eliminar" data-toggle="modal" data-target="#modal_eliminacion" onclick="$('#id_eliminar').val('{{ $alumno->id }}')">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                                <a href={{ route('alumno.edit', $alumno->id) }} class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        @endforeach                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>