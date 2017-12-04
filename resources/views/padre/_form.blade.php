<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Padre</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                @if ($padre->exists)
                    <form id="form-padre" class="form-horizontal form-label-left" action={{ route('padre.update',  $padre->id) }} method="POST">
                        {{ method_field('PUT') }}
                @else
                    <form id="form-padre" class="form-horizontal form-label-left" action={{ route('padre.store') }} method="POST">
                @endif
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="padre[datos_basico][cedula]">
                            <span class="required">*</span> 
                            Representantes:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="js-example-basic-single" style="width: 100%" name="padre[datos_basico][cedula]">
                                    <option value='0' > Selecciona la persona que deseas agregar como padre </option>
                                @foreach( $personas as $persona)
                                    <option value={{ $persona->cedula }} @if( $padre->exists) Selected @endif >
                                        {{ $persona->nombre.' '.$persona->nombre2.' '.$persona->apellido.' '.$persona->apellido2 }}
                                    </option>
                                @endforeach
                            </select>

                            @if ($errors->has('padre[datos_basico][cedula]'))
                                <span class="text-danger">{{ $errors->first('padre[datos_basico][cedula]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="padre[grado_instruccion]">
                            <span class="required">*</span> 
                            Grado de instrucción:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="padre[grado_instruccion]" class="form-control" id="padre_grado_instruccion" placeholder="Ocupación" aria-describedby="inputSuccess2Status"  value="{{ $padre->grado_instruccion or old('padre[grado_instruccion]') }}">

                            @if ($errors->has('padre[grado_instruccion]'))
                                <span class="text-danger">{{ $errors->first('padre[grado_instruccion]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="padre[difunto]">
                            <span class="required">*</span> 
                            Difunto:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <label class="radio-inline">
                                Si <input type="radio" class="flat" name="padre[difunto]" required value="1" id="padre_difunto_si" @if ($padre->difunto=="1" || old('padre[difunto]')=="1") checked @endif>
                            </label>
                            <label class="radio-inline">
                                No <input type="radio" class="flat" name="padre[difunto]" required value="0" id="padre_difunto_no" @if ($padre->difunto=="0" || old('padre[difunto]')=="0" ) checked @endif>
                            </label>

                            @if ($errors->has('padre[difunto]'))
                                <br/>
                                <span class="text-danger">{{ $errors->first('padre[difunto]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="padre[datos_basico][cedula]">
                            <span class="required">*</span> 
                            Cedula:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" class="form-control padre" id="padre_cedula" placeholder="Cedula" aria-describedby="inputSuccess2Status" readonly="true" value="{{ $padre->cedula or old('padre[datos_basico][cedula]') }}">

                            @if ($errors->has('padre[datos_basico][cedula]'))
                                <span class="text-danger">{{ $errors->first('padre[datos_basico][cedula]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="padre[datos_basico][nombre]">
                            <span class="required">*</span> 
                            Primer nombre:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="padre[datos_basico][nombre]" class="form-control padre" disabled="true" id="padre_nombre" placeholder="Primer nombre" aria-describedby="inputSuccess2Status"  value="{{ $padre->nombre or old('padre[datos_basico][nombre]') }}">

                            @if ($errors->has('padre[datos_basico][nombre]'))
                                <span class="text-danger">{{ $errors->first('padre[datos_basico][nombre]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="padre[datos_basico][nombre2]">
                            <span class="required"> </span> 
                            Segundo nombre:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="padre[datos_basico][nombre2]" class="form-control padre" disabled="true" id="padre_nombre2" placeholder="Segundo nombre" aria-describedby="inputSuccess2Status"  value="{{ $padre->nombre2 or old('padre[datos_basico][nombre2]') }}">

                            @if ($errors->has('padre[datos_basico][nombre2]'))
                                <span class="text-danger">{{ $errors->first('padre[datos_basico][nombre2]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="padre[datos_basico][apellido]">
                            <span class="required">*</span> 
                            Primer apellido:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="padre[datos_basico][apellido]" class="form-control padre" disabled="true" id="padre_apellido" placeholder="Primer apellido" aria-describedby="inputSuccess2Status"  value="{{ $padre->apellido or old('padre[datos_basico][apellido]') }}">
                            
                            @if ($errors->has('padre[datos_basico][apellido]'))
                                <span class="text-danger">{{ $errors->first('padre[datos_basico][apellido]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="padre[datos_basico][apellido2]">
                            <span class="required"> </span> 
                            Segundo apellido:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="padre[datos_basico][apellido2]" class="form-control padre" disabled="true" id="padre_apellido2" placeholder="Segundo apellido" aria-describedby="inputSuccess2Status"  value="{{ $padre->apellido2 or old('padre[datos_basico][apellido2]') }}">

                            @if ($errors->has('padre[datos_basico][apellido2]'))
                                <span class="text-danger">{{ $errors->first('padre[datos_basico][apellido2]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="padre[datos_basico][sexo]">
                            <span class="required">*</span> 
                            Sexo:
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control padre" style="font-family: 'FontAwesome', Helvetica;" name="padre[datos_basico][sexo]" disabled="true" id="padre_sexo">
                                <option value=''>Selecione su Sexo: &#xf228;</option>

                                <option class="text-danger" value="F" @if ( ($padre->sexo === 'F') || ( old('padre[datos_basico][sexo]') === 'F' )) selected @endif >Femenino &#xf221;</option>

                                <option class="text-primary" value="M" @if ( ($padre->sexo == 'M') || ( old('padre[datos_basico][sexo]') === 'M' ) ) selected @endif >Masculino &#xf222;</option>
                            </select>
                            
                            @if ($errors->has('padre[datos_basico][sexo]'))
                                <span class="text-danger">{{ $errors->first('padre[datos_basico][sexo]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="padre[datos_basico][fecha_nacimiento]">
                            <span class="required">*</span> 
                            Fecha de nacimiento:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="padre[datos_basico][fecha_nacimiento]" class="form-control has-feedback-left  padre" id="padre_fecha_nacimiento" disabled="true" placeholder="Fecha de nacimiento" aria-describedby="inputSuccess2Status"  value="{{ $padre->fecha_nacimiento or old('padre[datos_basico][fecha_nacimiento]') }}">
                            
                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                            @if ($errors->has('padre[datos_basico][fecha_nacimiento]'))
                                <span class="text-danger">{{ $errors->first('padre[datos_basico][fecha_nacimiento]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="padre[datos_basico][ocupacion]">
                            <span class="required">*</span> 
                            Ocupación:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="padre[datos_basico][ocupacion]" class="form-control padre" disabled="true" id="padre_ocupacion" placeholder="Ocupación" aria-describedby="inputSuccess2Status"  value="{{ $padre->ocupacion or old('padre[datos_basico][ocupacion]') }}">

                            @if ($errors->has('padre[datos_basico][ocupacion]'))
                                <span class="text-danger">{{ $errors->first('padre[datos_basico][ocupacion]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="padre[datos_basico][direccion]">
                            <span class="required">*</span> 
                            Dirección:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="padre[datos_basico][direccion]" class="form-control padre" disabled="true" id="padre_direccion" placeholder="Dirección" aria-describedby="inputSuccess2Status"  value="{{ $padre->direccion or old('padre[datos_basico][direccion]') }}">

                            @if ($errors->has('padre[datos_basico][direccion]'))
                                <span class="text-danger">{{ $errors->first('padre[datos_basico][direccion]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="padre[datos_basico][nacionalidad]">
                            <span class="required">*</span> 
                            Nacionalidad:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="padre[datos_basico][nacionalidad]" class="form-control padre" disabled="true" id="padre_nacionalidad" placeholder="Nacionalidad" aria-describedby="inputSuccess2Status"  value="{{ $padre->nacionalidad or old('padre[datos_basico][nacionalidad]') }}">

                            @if ($errors->has('padre[datos_basico][nacionalidad]'))
                                <span class="text-danger">{{ $errors->first('padre[datos_basico][nacionalidad]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="padre[datos_basico][telefono_celular]">
                            <span class="required">*</span> 
                            Telefono celular:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="padre[datos_basico][telefono_celular]" class="form-control padre" disabled="true" id="padre_telefono_celular" placeholder="Telefono celular" aria-describedby="inputSuccess2Status"  value="{{ $padre->telefono_celular or old('padre[datos_basico][telefono_celular]') }}">

                            @if ($errors->has('padre[datos_basico][telefono_celular]'))
                                <span class="text-danger">{{ $errors->first('padre[datos_basico][telefono_celular]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="padre[datos_basico][telefono_fijo]">
                            <span class="required">*</span> 
                            Telefono fijo:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="padre[datos_basico][telefono_fijo]" class="form-control padre" disabled="true" id="padre_telefono_fijo" placeholder="Telefono fijo" aria-describedby="inputSuccess2Status"  value="{{ $padre->telefono_fijo or old('padre[datos_basico][telefono_fijo]') }}">

                            @if ($errors->has('padre[datos_basico][telefono_fijo]'))
                                <span class="text-danger">{{ $errors->first('padre[datos_basico][telefono_fijo]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-center">
                            <a href={{ route('padre.index') }} class="btn btn-danger">Volver</a>
                            <button class="btn btn-default" type="reset">Limpiar</button>
                            <button class="btn btn-success" type="submit">Guardar</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>