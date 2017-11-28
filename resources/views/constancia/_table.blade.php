<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Solicitudes</h2>
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
                                @if($bandera=='index')
                                    <a href={{ route('constancia.create') }} class="btn btn-success btn-xs" title="Crear">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                @else
                                    Accion
                                @endif
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($solicitudes as $solicitud)
                        <tr>
                            <td>{{ $solicitud->estatus }}</td>
                            <td>{{ $solicitud->usuario->datosBasico->nombre}} {{ $solicitud->usuario->datosBasico->apellido}}</td>
                            <td>{{ $solicitud->alumno->datosBasico->nombre}} {{ $solicitud->alumno->datosBasico->apellido}}</td>
                            <td>{{ $solicitud->inscripcion->fecha}}</td>
                            @if($bandera=='solicitudes')
                                <td class="text-center">
                                    <a href={{ route('constancia.constancia', $solicitud->id) }} class="btn btn-danger btn-xs" title="Generar conatancia"><i class="fa fa-file-text"></i></a>
                                </td>
                            @elseif($bandera=='retiros')
                                <td class="text-center">
                                    <a href={{ route('retiro.retiro', $solicitud->id) }} class="btn btn-danger btn-xs" title="Generar conatancia"><i class="fa fa-file-text"></i></a>
                                </td>
                            @else
                                <td class="text-center">
                                    <button type="button" class="btn btn-success btn-xs" title="Eliminar" data-toggle="modal" data-target="#modal_eliminacion" onclick="$('#id_eliminar').val('{{ $solicitud->id }}')">
                                    <i class="fa fa-check-square-o"></i>
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