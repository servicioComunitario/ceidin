<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Docente</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                @if ($docente->exists)
                    <form id="form-rol" class="form-horizontal form-label-left" action={{ route('docente.update',  $docente->id) }} method="POST">
                        {{ method_field('PUT') }}
                        <h1 style="margin-top: 0;">Editar Docente</h1>
                @else
                    <form id="form-rol" class="form-horizontal form-label-left" action={{ route('docente.store') }} method="POST">
                        <h1 style="margin-top: 0;">Registrar Docente</h1>
                @endif
                        {{ csrf_field() }}



                        <div class="form-group has-feedback{{ $errors->has('estatus') ? ' has-error' : '' }}">
                            <select id="select_usuario" class="form-control" style="font-family: 'FontAwesome', Helvetica;" name="datos_basico_id">
                                <option value=''>Selecione un usuario</option>
                                @foreach($usuarios as $usuario)
                                    <option value={{$usuario->datosBasico->id}} @if(isset($docente->datos_basico_id)) @if ($usuario->datosBasico->id==$docente->datos_basico_id) selected @endif @endif >{{$usuario->datosBasico->nombre}} {{$usuario->datosBasico->apellido}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('sexo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('sexo') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('estatus') ? ' has-error' : '' }}">
                            <select class="form-control" style="font-family: 'FontAwesome', Helvetica;" name="estatus">
                                <option value=''>Selecione el estado</option>
                                <option value="1" @if(isset($docente->id)) @if ($docente->estatus=="1") selected @endif @endif >Activo</option>
                                <option value="0" @if(isset($docente->id)) @if ($docente->estatus=="0") selected @endif @endif >Inactivo</option>
                            </select>

                            @if ($errors->has('sexo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('sexo') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div>
                            <button class="btn btn-default submit" >Registrar</button>
                        </div>

                        <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>