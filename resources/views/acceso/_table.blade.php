<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Accesos</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="tbl_accesos" class="table table-striped table-bordered jambo_table">
                    <thead>
                        <tr>
                            <th>Rol</th>
                            <th>Aceesos</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($accesos as $acceso)
                        <tr>
                            <td>{{ $acceso->nombre }}</td>
                            <td>{{ $acceso->rutas}}</td>
                            <td class="text-center">
                                <a href={{ route('acceso.edit', $acceso->id) }} class="btn btn-primary btn-xs" title="Editar">Editar <i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        @endforeach                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>