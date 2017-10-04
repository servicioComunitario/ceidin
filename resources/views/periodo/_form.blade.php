<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Periodo</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                @if ($periodo->exists)
                    <form id="form-periodo" class="form-horizontal form-label-left" action={{ route('periodo.update',  $periodo->id) }} method="POST">
                        {{ method_field('PUT') }}
                @else
                    <form id="form-periodo" class="form-horizontal form-label-left" action={{ route('periodo.store') }} method="POST">
                @endif
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_inicio"><span class="required">*</span> Fecha de Inicio:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="fecha_inicio" class="form-control has-feedback-left" id="fecha_inicio" placeholder="Inicio del Periodo Escolar" aria-describedby="inputSuccess2Status"  value="{{ $periodo->fecha_inicio or old('fecha_inicio') }}">
                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                            @if ($errors->has('fecha_inicio'))
                                <span class="text-danger">{{ $errors->first('fecha_inicio') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_fin"><span class="required">*</span> Fecha de Fin:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="fecha_fin" class="form-control has-feedback-left" id="fecha_fin" placeholder="Fin del Periodo Escolar" aria-describedby="inputSuccess2Status" value="{{ $periodo->fecha_fin or old('fecha_fin') }}">
                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                            @if ($errors->has('fecha_fin'))
                                <span class="text-danger">{{ $errors->first('fecha_fin') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre"><span class="required">*</span> Nombre:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="nombre" class="form-control col-md-7 col-xs-12" id="nombre" placeholder="Nombre del Periodo" value="{{ $periodo->nombre or old('nombre') }}" readonly>
                            @if ($errors->has('nombre'))
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="estado"><span class="required">*</span> Estado:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="radio-inline">
                                ABIERTO <input type="radio" class="flat" name="estado" id="estadoAbierto" value="ABIERTO"  @if ($periodo->estado=="ABIERTO" || old('estado')=="ABIERTO") checked @endif>
                            </label>
                            <label class="radio-inline">
                                CERRADO <input type="radio" class="flat" name="estado" id="estadoCerrado" value="CERRADO" @if ($periodo->estado=="CERRADO" || old('estado')=="CERRADO") checked @endif>
                            </label>
                            @if ($errors->has('estado'))
                                <br/>
                                <span class="text-danger">{{ $errors->first('estado') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-center">
                            <a href={{ route('periodo.index') }} class="btn btn-danger">Volver</a>
                            <button class="btn btn-default" type="reset">Limpiar</button>
                            <button class="btn btn-success" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>