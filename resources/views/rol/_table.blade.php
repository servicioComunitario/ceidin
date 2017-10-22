<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Roles</h2>
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
                            <th>Descripción</th>
                            <th>Usuarios</th>
                            <th>Activo</th>
                            <th style="width: 80px;" class="text-center">
                                <a href={{ route('rol.create') }} class="btn btn-success btn-xs" title="Crear">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $rol)
                        <tr>
                            <td>{{ $rol->nombre }}</td>
                            <td>{{ $rol->descripcion}}</td>
                            <td>{{ $rol->usuarios}}</td>
                            <td>{{ $rol->activo ? "Sí" : "No" }}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-xs" title="Eliminar" data-toggle="modal" data-target="#modal_eliminacion" onclick="$('#id_eliminar').val('{{ $rol->id }}')">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                                <a href={{ route('rol.edit', $rol->id) }} class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        @endforeach                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>