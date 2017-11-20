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
                        {{-- Nombre del Rol --}}

                        <div class="form-group has-feedback{{ $errors->has('cedula') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="cedula" value="{{ $docente->datosBasico->cedula or old('cedula') }}" placeholder="Ingrese su Cédula">
                            <span class="fa fa-id-card form-control-feedback"></span>

                            @if ($errors->has('cedula'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cedula') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="nombre" value="{{ $docente->datosBasico->nombre or old('nombre')}}" placeholder="Ingrese su Nombre">
                            <span class="fa fa-user form-control-feedback"></span>

                            @if ($errors->has('nombre'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('apellido') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="apellido" value="{{ $docente->datosBasico->apellido or old('apellido')}}" placeholder="Ingrese su Apellido">
                            <span class="fa fa-user-o form-control-feedback"></span>

                            @if ($errors->has('apellido'))
                            <span class="help-block">
                                <strong>{{ $errors->first('apellido') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('sexo') ? ' has-error' : '' }}">
                            <select class="form-control" style="font-family: 'FontAwesome', Helvetica;" name="sexo">
                                <option value=''>Selecione su Sexo: &#xf228;</option>
                                <option class="text-danger" value="F" @if(isset($docente->id)) @if ($docente->datosBasico->sexo=="F") selected @endif @endif >Femenino &#xf221;</option>
                                <option class="text-primary" value="M" @if(isset($docente->id)) @if ($docente->datosBasico->sexo=="M") selected @endif @endif >Masculino &#xf222;</option>
                            </select>

                            @if ($errors->has('sexo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('sexo') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $docente->datosBasico->fecha_nacimiento or old('fecha_nacimiento')}}" placeholder="Fecha de Nacimiento dd-mm-aaaa">
                            <span class="fa fa-birthday-cake form-control-feedback"></span>

                            @if ($errors->has('apellido'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
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