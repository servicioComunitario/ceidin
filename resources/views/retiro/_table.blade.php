<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Inscripciones</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="tbl_roles" class="table table-striped table-bordered jambo_table">
                    <thead>
                        <tr>
                            <th>Estado</th>
                            <th>Solicitante</th>
                            <th>Alumno</th>
                            <th>Lapso inscripcion</th>
                            <th style="width: 80px;" class="text-center">
                                <a href={{ route('retiro.create') }} class="btn btn-success btn-xs" title="Crear">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($retiros as $retiro)
                        <tr>
                            <td>{{ $retiro->estatus }}</td>
                            <td>{{ $retiro->usuario->datosBasico->nombre}} {{ $retiro->usuario->datosBasico->apellido}}</td>
                            <td>abc</td>
                            <td>{{ $retiro->inscripcion_id}}</td>
                            @if($bandera==true)
                                <td class="text-center">
                                    <a href={{ route('constancia.constancia', $retiro->id) }} class="btn btn-primary btn-xs" title="Generar conatancia"><i class="fa fa-pencil"></i></a>
                                </td>
                            @else
                                <td class="text-center">
                                    <button type="button" class="btn btn-danger btn-xs" title="Eliminar" data-toggle="modal" data-target="#modal_eliminacion" onclick="$('#id_eliminar').val('{{ $retiro->id }}')">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                                </td>
                            @endif()
                        </tr>
                        @endforeach                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>