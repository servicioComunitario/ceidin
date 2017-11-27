<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Colaboraciones</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="tbl_roles" class="table table-striped table-bordered jambo_table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Monto</th>
                            <th>Cedula</th>
                            <th>Rif</th>
                            <th>Motivo</th>
                            <th>Fecha</th>
                            <th style="width: 80px;" class="text-center">
                                <a href={{ route('colaboracion.create') }} class="btn btn-success btn-xs" title="Crear">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($colaboraciones as $colaboracion)
                        <tr>
                            <td>{{ $colaboracion->nombre }}</td>
                            <td>{{ $colaboracion->descripcion}}</td>
                            <td>{{ $colaboracion->monto}}</td>
                            <td>{{ $colaboracion->cedula}}</td>
                            <td>{{ $colaboracion->rif}}</td>
                            <td>{{ $colaboracion->motivo}}</td>
                            <td>{{ $colaboracion->fecha}}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-xs" title="Eliminar" data-toggle="modal" data-target="#modal_eliminacion" onclick="$('#id_eliminar').val('{{ $colaboracion->id }}')">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                                <a href={{ route('colaboracion.edit', $colaboracion->id) }} class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        @endforeach                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>