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
                            <th>Nombre</th>
                            <th>Apelldio</th>
                            <th>Cedula</th>
                            <th>Direccion</th>
                            <th style="width: 80px;" class="text-center">
                                <a href={{ route('docente.create') }} class="btn btn-success btn-xs" title="Crear">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($docentes as $docente)
                        <tr>
                            <td>{{ $docente->datosBasico->nombre }}</td>
                            <td>{{ $docente->datosBasico->apellido}}</td>
                            <td>{{ $docente->datosBasico->cedula}}</td>
                            <td>{{ $docente->datosBasico->direccion}}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-xs" title="Eliminar" data-toggle="modal" data-target="#modal_eliminacion" onclick="$('#id_eliminar').val('{{ $docente->id }}')">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                                <a href={{ route('docente.edit', $docente->id) }} class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        @endforeach                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>