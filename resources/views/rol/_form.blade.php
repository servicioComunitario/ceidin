<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Rol</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                @if ($rol->exists)
                    <form id="form-rol" class="form-horizontal form-label-left" action={{ route('rol.update',  $rol->id) }} method="POST">
                        {{ method_field('PUT') }}
                @else
                    <form id="form-rol" class="form-horizontal form-label-left" action={{ route('rol.store') }} method="POST">
                @endif
                    {{ csrf_field() }}
                    {{-- Nombre del Rol --}}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre"><span class="required">*</span> Nombre:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="nombre" class="form-control col-md-7 col-xs-12" id="nombre" placeholder="Nombre del rol" value="{{ $rol->nombre or old('nombre') }}">
                            @if ($errors->has('nombre'))
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            @endif
                        </div>
                    </div>
                    {{-- Descripción del Rol --}}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="descripcion"><span class="required">*</span> Descripción:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="descripcion" class="form-control col-md-7 col-xs-12" id="descripcion" placeholder="Descripción del rol" value="{{ $rol->descripcion or old('descripcion') }}">
                            @if ($errors->has('descripcion'))
                                <span class="text-danger">{{ $errors->first('descripcion') }}</span>
                            @endif
                        </div>
                    </div>
                    {{-- Estado Activo del Rol --}}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="activo"><span class="required">*</span> Activo:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="radio-inline">
                                SÍ <input type="radio" class="flat" name="activo" id="activoSi" value="1"  @if ($rol->activo || old('activo')) checked @endif>
                            </label>
                            <label class="radio-inline">
                                NO <input type="radio" class="flat" name="activo" id="activoCerrado" value="0" @if ($rol->activo=="0" || old('activo')=="0") checked @endif>
                            </label>
                            @if ($errors->has('activo'))
                                <br/>
                                <span class="text-danger">{{ $errors->first('activo') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-center">
                            <a href={{ route('rol.index') }} class="btn btn-danger">Volver</a>
                            <button class="btn btn-default" type="reset">Limpiar</button>
                            <button class="btn btn-success" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>