<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Inscripcion</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                @if ($inscripcion->exists)
                    <form id="form-inscripcion" class="form-horizontal form-label-left" action={{ route('inscripcion.update',  $inscripcion->id) }} method="POST">
                        {{ method_field('PUT') }}
                @else
                    <form id="form-inscripcion" class="form-horizontal form-label-left" action={{ route('inscripcion.store') }} method="POST">
                @endif
                {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inscripcion[fotos]"><span class="required">*</span> Fotos:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="radio-inline">
                                Si <input type="radio" class="flat" name="inscripcion[fotos]" id="inscripcion_fotos_si" value="1"  @if ($inscripcion->fotos == 1 || old('inscripcion[fotos]')== 1) checked @endif>
                            </label>
                            <label class="radio-inline">
                                No <input type="radio" class="flat" name="inscripcion[fotos]" id="inscripcion_fotos_no" value="0" @if ($inscripcion->fotos == 0 || old('inscripcion[fotos]') == 0) checked @endif>
                            </label>
                            @if ($errors->has('inscripcion[fotos]'))
                                <br/>
                                <span class="text-danger">{{ $errors->first('inscripcion[fotos]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inscripcion[partida_nacimiento]"><span class="required">*</span> Parida de nacimiento:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="radio-inline">
                                Si <input type="radio" class="flat" name="inscripcion[partida_nacimiento]" id="inscripcion_partida_nacimiento_si" value="1"  @if ($inscripcion->partida_nacimiento == 1 || old('inscripcion[partida_nacimiento]')== 1) checked @endif>
                            </label>
                            <label class="radio-inline">
                                No <input type="radio" class="flat" name="inscripcion[partida_nacimiento]" id="inscripcion_partida_nacimiento_no" value="0" @if ($inscripcion->partida_nacimiento == 0 || old('inscripcion[partida_nacimiento]') == 0) checked @endif>
                            </label>
                            @if ($errors->has('inscripcion[partida_nacimiento]'))
                                <br/>
                                <span class="text-danger">{{ $errors->first('inscripcion[partida_nacimiento]') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inscripcion[tarjeta_vacunacion]"><span class="required">*</span> Tarjeta vacunación:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="radio-inline">
                                Si <input type="radio" class="flat" name="inscripcion[tarjeta_vacunacion]" id="inscripcion_si" value="1"  @if ($inscripcion->tarjeta_vacunacion == 1 || old('inscripcion[tarjeta_vacunacion]')== 1) checked @endif>
                            </label>
                            <label class="radio-inline">
                                No <input type="radio" class="flat" name="inscripcion[tarjeta_vacunacion]" id="inscripcion_no" value="0" @if ($inscripcion->tarjeta_vacunacion == 0 || old('inscripcion[tarjeta_vacunacion]') == 0) checked @endif>
                            </label>
                            @if ($errors->has('inscripcion[tarjeta_vacunacion]'))
                                <br/>
                                <span class="text-danger">{{ $errors->first('inscripcion[tarjeta_vacunacion]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inscripcion[copia_cedula_madre]"><span class="required">*</span> Copia cedula de la madre:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="radio-inline">
                                Si <input type="radio" class="flat" name="inscripcion[copia_cedula_madre]" id="inscripcion_si" value="1"  @if ($inscripcion->copia_cedula_madre == 1 || old('inscripcion[copia_cedula_madre]')== 1) checked @endif>
                            </label>
                            <label class="radio-inline">
                                No <input type="radio" class="flat" name="inscripcion[copia_cedula_madre]" id="inscripcion_no" value="0" @if ($inscripcion->copia_cedula_madre == 0 || old('inscripcion[copia_cedula_madre]') == 0) checked @endif>
                            </label>
                            @if ($errors->has('inscripcion[copia_cedula_madre]'))
                                <br/>
                                <span class="text-danger">{{ $errors->first('inscripcion[copia_cedula_madre]') }}</span>
                            @endif
                        </div>
                    </div>
                      
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inscripcion[copia_cedula_padre]"><span class="required">*</span> Copia cedula del padre:</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="radio-inline">
                                Si <input type="radio" class="flat" name="inscripcion[copia_cedula_padre]" id="inscripcion_si" value="1"  @if ($inscripcion->copia_cedula_padre == 1 || old('inscripcion[copia_cedula_padre]')== 1) checked @endif>
                            </label>
                            <label class="radio-inline">
                                No <input type="radio" class="flat" name="inscripcion[copia_cedula_padre]" id="inscripcion_no" value="0" @if ($inscripcion->copia_cedula_padre == 0 || old('inscripcion[copia_cedula_padre]') == 0) checked @endif>
                            </label>
                            @if ($errors->has('inscripcion[copia_cedula_padre]'))
                                <br/>
                                <span class="text-danger">{{ $errors->first('inscripcion[copia_cedula_padre]') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inscripcion[talla_entrada]">
                            <span class="required"> </span> 
                            Talla entrada:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="inscripcion[talla_entrada]" class="form-control " id="" placeholder="" aria-describedby="inputSuccess2Status"  value="{{ old('inscripcion[talla_entrada]') }}">

                            @if ($errors->has('inscripcion[talla_entrada]'))
                                <span class="text-danger">{{ $errors->first('inscripcion[talla_entrada]') }}</span>
                            @endif
                        </div>
		            </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inscripcion[peso_entrada]">
                            <span class="required"> </span> 
                            Peso entrada:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="inscripcion[peso_entrada]" class="form-control " id="" placeholder="" aria-describedby="inputSuccess2Status"  value="{{ old('inscripcion[peso_entrada]') }}">

                            @if ($errors->has('inscripcion[peso_entrada]'))
                                <span class="text-danger">{{ $errors->first('inscripcion[peso_entrada]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inscripcion[talla_salida]">
                            <span class="required"> </span> 
                            Talla salida:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="inscripcion[talla_salida]" class="form-control " id="" placeholder="" aria-describedby="inputSuccess2Status"  value="{{ old('inscripcion[talla_salida]') }}">

                            @if ($errors->has('inscripcion[talla_salida]'))
                                <span class="text-danger">{{ $errors->first('inscripcion[talla_salida]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inscripcion[peso_salida]">
                            <span class="required"> </span> 
                            Peso salida:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="inscripcion[peso_salida]" class="form-control " id="" placeholder="" aria-describedby="inputSuccess2Status"  value="{{ old('inscripcion[peso_salida]') }}">

                            @if ($errors->has('inscripcion[peso_salida]'))
                                <span class="text-danger">{{ $errors->first('inscripcion[peso_salida]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inscripcion[cedula_representante]">
                            <span class="required"> </span> 
                            Cedula representante:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="inscripcion[cedula_representante]" class="form-control " id="cedula_representante" placeholder="" aria-describedby="inputSuccess2Status"  value="{{ old('inscripcioncedula_representante[]') }}">

                            @if ($errors->has('inscripcion[cedula_representante]'))
                                <span class="text-danger">{{ $errors->first('inscripcion[cedula_representante]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="inscripcion[estatus]">
                            <span class="required"> </span> 
                            Estatus:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="inscripcion[estatus]" class="form-control " id="" placeholder="" aria-describedby="inputSuccess2Status"  value="{{ old('inscripcion[estatus]') }}">

                            @if ($errors->has('inscripcion[estatus]'))
                                <span class="text-danger">{{ $errors->first('inscripcion[estatus]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-center">
                            <a href={{ route('inscripcion.index') }} class="btn btn-danger">Volver</a>
                            <button class="btn btn-default" type="reset">Limpiar</button>
                            <button class="btn btn-success" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
