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
                    <form id="form-periodo" class="form-horizontal form-label-left" action={{ route('periodos.update',  $periodo->id) }} method="POST">
                        {{ method_field('PUT') }}
                @else
                    <form id="form-periodo" class="form-horizontal form-label-left" action={{ route('periodos.store') }} method="POST">
                @endif
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inicio"><span class="required">*</span> Inicio:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="inicio" class="form-control has-feedback-left" id="inicio" placeholder="Inicio del periodo escolar" aria-describedby="inputSuccess2Status"  value="{{ $periodo->inicio or old('inicio') }}">
                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                            @if ($errors->has('inicio'))
                                <span class="text-danger">{{ $errors->first('inicio') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fin"><span class="required">*</span> Fin:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="fin" class="form-control has-feedback-left" id="fin" placeholder="Inicio del periodo escolar" aria-describedby="inputSuccess2Status" value="{{ $periodo->fin or old('fin') }}">
                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                            @if ($errors->has('fin'))
                                <span class="text-danger">{{ $errors->first('fin') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre"><span class="required">*</span> Nombre:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="nombre" class="form-control col-md-7 col-xs-12" id="nombre" placeholder="Nombre del Periodo" value="{{ $periodo->nombre or old('nombre') }}">
                            @if ($errors->has('nombre'))
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-center">
                            <a href={{ route('periodos.index') }} class="btn btn-danger">Volver</a>
                            <button class="btn btn-default" type="reset">Limpiar</button>
                            <button class="btn btn-success" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




