<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Usuario</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                @if ($usuario->exists)
                    <form id="form-usuario" class="form-horizontal form-label-left" action={{ route('usuario.update',  $usuario->id) }} method="POST">
                        {{ method_field('PUT') }}
                @else
                    <form id="form-usuario" class="form-horizontal form-label-left" action={{ route('usuario.store') }} method="POST">
                @endif
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="cedula"><span class="required">*</span> Cédula:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="cedula" class="form-control col-md-7 col-xs-12" id="cedula" placeholder="Cédula del Usuario" value="{{ $usuario->cedula or old('cedula') }}">
                            @if ($errors->has('cedula'))
                                <span class="text-danger">{{ $errors->first('cedula') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre"><span class="required">*</span> Nombre:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="nombre" class="form-control col-md-7 col-xs-12" id="nombre" placeholder="Nombre del Usuario" value="{{ $usuario->nombre or old('nombre') }}">
                            @if ($errors->has('nombre'))
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="apellido"><span class="required">*</span> Apellido:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="apellido" class="form-control col-md-7 col-xs-12" id="apellido" placeholder="Apellido del Usuario" value="{{ $usuario->apellido or old('apellido') }}">
                            @if ($errors->has('apellido'))
                                <span class="text-danger">{{ $errors->first('apellido') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="sexo"><span class="required">*</span> Estado:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="radio-inline">
                                FEMENINO <input type="radio" class="flat" name="sexo" id="sexoF" value="F"  @if ($usuario->sexo=="F" || old('sexo')=="F") checked @endif>
                            </label>
                            <label class="radio-inline">
                                MASCULINO <input type="radio" class="flat" name="sexo" id="sexoM" value="M" @if ($usuario->sexo=="M" || old('sexo')=="M") checked @endif>
                            </label>
                            @if ($errors->has('sexo'))
                                <br/>
                                <span class="text-danger">{{ $errors->first('sexo') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_nacimiento"><span class="required">*</span> Fecha de Nacimiento:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="fecha_nacimiento" class="form-control col-md-7 col-xs-12" id="fecha_nacimiento" placeholder="Fecha de nacimiento del Usuario dd-mm-yyyy" value="{{ $usuario->fecha_nacimiento or old('fecha_nacimiento') }}">
                            @if ($errors->has('fecha_nacimiento'))
                                <span class="text-danger">{{ $errors->first('fecha_nacimiento') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"><span class="required">*</span> Email:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="email" class="form-control col-md-7 col-xs-12" id="email" placeholder="Email del Usuario" value="{{ $usuario->email or old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password"><span class="required">*</span> Password:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" name="password" class="form-control col-md-7 col-xs-12" id="password" placeholder="Contraseña del Usuario">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password_confirmation"><span class="required">*</span> Confirme la Password:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="password" name="password_confirmation" class="form-control col-md-7 col-xs-12" id="password_confirmation" placeholder="Repita la contraseña del Usuario">
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rol_id"><span class="required">*</span> Rol:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="rol_id" class="form-control col-md-7 col-xs-12" id="rol_id">
                            <option value=''>Seleccione el Rol del Usuario</option>
                                @foreach ($roles as $rol)
                                    <option value='{{ $rol->id }}' {{ ($usuario->rol_id ?: old('rol_id'))==$rol->id ? 'selected':'' }}>{{ $rol->nombre }}</option>
                                @endforeach
                          </select>
                          @if ($errors->has('rol_id'))
                              <span class="text-danger">{{ $errors->first('rol_id') }}</span>
                          @endif
                        </div>
                      </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-center">
                            <a href={{ route('usuario.index') }} class="btn btn-danger">Volver</a>
                            <button class="btn btn-default" type="reset">Limpiar</button>
                            <button class="btn btn-success" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>