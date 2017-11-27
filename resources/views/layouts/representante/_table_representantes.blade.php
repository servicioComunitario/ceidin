<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Representantes</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="tbl_representantes" class="table table-striped table-bordered jambo_table">
                    <thead>
                        <tr>
                            <th>Nombre(s)</th>
                            <th>Apellido(s)</th>
                            <th>Cedula</th>
                            <th>Celular</th>
                            
                            <th style="width: 80px;" class="text-center th-opciones">
                                Accion
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($representantes as $representante)
                        <tr>
                            <td>{{ $representante->nombre.' '.$representante->nombre2 }}</td>
                            <td>{{ $representante->apellido.' '.$representante->apellido2 }}</td>
                            <td>{{ $representante->cedula }}</td>
                            <td>{{ $representante->telefono_celular }}</td>
                            <td class="text-center">
                                @if($tipo=='constancia')
                                    <a href={{ route('admin.constancia.alumno', $representante->id) }} class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-search"></i></a>
                                @else
                                    <a href={{ route('admin.retiro.alumno', $representante->id) }} class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-search"></i></a>
                                @endif
                            </td>
                        </tr>
                        @endforeach                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>