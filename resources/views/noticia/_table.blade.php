<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Noticias</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="tbl_noticias" class="table table-striped table-bordered jambo_table">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Fecha</th>
                            <th>Principal</th>
                            <th>Orden</th>
                            <th>Usuario</th>
                            <th style="width: 80px;" class="text-center">
                                <a href={{ route('noticia.create') }} class="btn btn-success btn-xs" title="Crear">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($noticias as $noticia)
                        <tr>
                            <td>{{ $noticia->titulo }}</td>
                            <td>{{ $noticia->fecha}}</td>
                            <td align="center">{!! $noticia->principal ? "<i class='fa fa-check-square-o' aria-hidden='true'></i>" : "<i class='fa fa-square-o' aria-hidden='true'></i>" !!}</td>
                            <td>{{ $noticia->orden}}</td>
                            <td>{{ $noticia->usuario->nombre.' '.$noticia->usuario->apellido[0].'.'}}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-xs" title="Eliminar" data-toggle="modal" data-target="#modal_eliminacion" onclick="$('#id_eliminar').val('{{ $noticia->id }}')"> <i class="fa fa-trash-o"></i>
                                </button>
                                <a href={{ route('noticia.edit', $noticia->id) }} class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        @endforeach                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>