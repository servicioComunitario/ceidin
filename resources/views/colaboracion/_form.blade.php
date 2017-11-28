<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Colaboracion</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                @if ($colaboracion->exists)
                    <form id="form-rol" class="form-horizontal form-label-left" action={{ route('colaboracion.update',  $colaboracion->id) }} method="POST">
                        {{ method_field('PUT') }}
                        <h1 style="margin-top: 0;">Editar Colaboracion</h1>
                @else
                    <form id="form-rol" class="form-horizontal form-label-left" action={{ route('colaboracion.store') }} method="POST">
                        <h1 style="margin-top: 0;">Registrar Colaboracion</h1>
                @endif
                        {{ csrf_field() }}

                        <div class="form-group has-feedback{{ $errors->has('cedula') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="cedula" value="{{ $colaboracion->cedula or old('cedula') }}" placeholder="Ingrese su Cédula">

                            @if ($errors->has('cedula'))
                            <span class="help-block">
                                <strong>{{ $errors->first('cedula') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="nombre" value="{{ $colaboracion->nombre or old('nombre') }}" placeholder="Ingrese su Nombre">

                            @if ($errors->has('nombre'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('descripcion') ? ' has-error' : '' }}">
                            <textarea type="text" class="form-control" name="descripcion" value="{{ $colaboracion->descripcion or old('descripcion') }}" placeholder="Ingrese la Descripcion"></textarea>

                            @if ($errors->has('descripcion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('descripcion') }}</strong>
                            </span>
                            @endif
                        </div>
                        
                        <div class="form-group has-feedback{{ $errors->has('rif') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="rif" value="{{ $colaboracion->rif or old('rif') }}" placeholder="Ingrese el rif">

                            @if ($errors->has('rif'))
                            <span class="help-block">
                                <strong>{{ $errors->first('rif') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('motivo') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="motivo" value="{{ $colaboracion->motivo or old('motivo') }}" placeholder="Ingrese el motivo">

                            @if ($errors->has('motivo'))
                            <span class="help-block">
                                <strong>{{ $errors->first('motivo') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('monto') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="monto" value="{{ $colaboracion->monto or old('monto') }}" placeholder="Ingrese el monto">

                            @if ($errors->has('monto'))
                            <span class="help-block">
                                <strong>{{ $errors->first('monto') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('fecha') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="fecha" value="{{ $colaboracion->fecha or old('fecha') }}" placeholder="Ingrese la fecha">

                            @if ($errors->has('fecha'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fecha') }}</strong>
                            </span>
                            @endif
                        </div>

                        <input type="hidden" name="usuario_id" value={{ Auth::user()->id }}>
                        
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