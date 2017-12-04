<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        {{-- representante --}}
        <div class="x_panel">
            <div class="x_title">
                <h2>Representante</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                @if ($representante->exists)
                    <form id="form-representante" class="form-horizontal form-label-left" action={{ route('representante.update',  $representante->id) }} method="POST">
                        {{ method_field('PUT') }}
                @else
                    <form id="form-representante" class="form-horizontal form-label-left" action={{ route('representante.store') }} method="POST">
                @endif
                    {{ csrf_field() }}

                    <br />

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="representante[datos_basico][cedula]">
                            <span class="required">*</span> 
                            Representantes:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="js-example-basic-single" style="width: 100%">
                                    <option value='0' > Selecciona la persona que deseas agregar como representante </option>
                                @foreach( $personas as $persona)
                                    <option value={{ $persona->cedula }}>
                                        {{ $persona->nombre.' '.$persona->nombre2.' '.$persona->apellido.' '.$persona->apellido2 }} 
                                    </option>
                                @endforeach
                            </select>

                            @if ($errors->has('representante[datos_basico][cedula]'))
                                <span class="text-danger">{{ $errors->first('representante[datos_basico][cedula]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="representante[parentesco]">
                            <span class="required">*</span> 
                            Parentesco:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="representante[parentesco]" required="true" class="form-control" id="representante_parentesco" placeholder="Parentesco" aria-describedby="inputSuccess2Status"  value="{{ $representante->parentesco or old('representante[parentesco]') }}">

                            @if ($errors->has('representante[parentesco]'))
                                <span class="text-danger">{{ $errors->first('representante[parentesco]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="representante[datos_basico][cedula]">
                            <span class="required">*</span> 
                            Cedula:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="representante[datos_basico][cedula]" required="true" class="form-control representante" id="representante_cedula" placeholder="Cedula" aria-describedby="inputSuccess2Status"  value="{{ $representante->cedula or old('representante[datos_basico][cedula]') }}">

                            @if ($errors->has('representante[datos_basico][cedula]'))
                                <span class="text-danger">{{ $errors->first('representante[datos_basico][cedula]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">
                            <span class="required">*</span> 
                            Primer nombre:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="representante_nombre" type="text" disabled="true" name="representante[datos_basico][nombre]" class="form-control  representante" placeholder="Primer nombre" aria-describedby="inputSuccess2Status"  value="{{ $representante->nombre or old('representante[datos_basico][nombre]') }}">

                            @if ($errors->has('representante[datos_basico][nombre]'))
                                <span class="text-danger">{{ $errors->first('representante[datos_basico][nombre]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="representante[datos_basico][nombre2]">
                            <span class="required"> </span> 
                            Segundo nombre:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="representante[datos_basico][nombre2]" disabled="true" class="form-control representante" id="representante_nombre2" placeholder="Segundo nombre" aria-describedby="inputSuccess2Status"  value="{{ $representante->nombre2 or old('representante[datos_basico][nombre2]') }}">

                            @if ($errors->has('representante[datos_basico][nombre2]'))
                                <span class="text-danger">{{ $errors->first('representante[datos_basico][nombre2]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="representante[datos_basico][apellido]">
                            <span class="required">*</span> 
                            Primer apellido:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="representante[datos_basico][apellido]" disabled="true" class="form-control representante" id="representante_apellido" placeholder="Primer apellido" aria-describedby="inputSuccess2Status"  value="{{ $representante->apellido or old('apellido') }}">

                            @if ($errors->has('representante[datos_basico][apellido]'))
                                <span class="text-danger">{{ $errors->first('representante[datos_basico][apellido]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="representante[datos_basico][apellido2]">
                            <span class="required"> </span> 
                            Segundo apellido:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="representante[datos_basico][apellido2]" disabled="true" class="form-control representante" id="representante_apellido2" placeholder="Segundo apellido" aria-describedby="inputSuccess2Status"  value="{{ $representante->apellido2 or old('representante[datos_basico][apellido2]') }}">

                            @if ($errors->has('representante[datos_basico][apellido2]'))
                                <span class="text-danger">{{ $errors->first('representante[datos_basico][apellido2]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="representante[datos_basico][sexo]">
                            <span class="required">*</span> 
                            Sexo: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <select class="form-control representante" style="font-family: 'FontAwesome', Helvetica;" name="representante[datos_basico][sexo]" disabled="true" id="representante_sexo">
                                <option value=''>Selecione su Sexo: &#xf228;</option>
                                <option class="text-danger" value="F" @if ( old('representante[datos_basico][sexo]') == 'F' ) selected @endif >Femenino &#xf221;</option>
                                <option class="text-primary" value="M" @if ( old('representante[datos_basico][sexo]') == 'M') selected @endif >Masculino &#xf222;</option>
                            </select>
                            
                            @if ($errors->has('representante[datos_basico][sexo]'))
                                <span class="text-danger">{{ $errors->first('representante[datos_basico][sexo]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="representante[datos_basico][fecha_nacimiento]">
                            <span class="required">*</span> 
                                Fecha de nacimiento:
                            </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="representante[datos_basico][fecha_nacimiento]" disabled="true" class="form-control has-feedback-left  representante" id="representante_fecha_nacimiento" placeholder="Fecha de nacimiento" aria-describedby="inputSuccess2Status"  value="{{ $representante->fecha_nacimiento or old('representante[datos_basico][fecha_nacimiento]') }}">
                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                            @if ($errors->has('representante[datos_basico][fecha_nacimiento]'))
                                <span class="text-danger">{{ $errors->first('representante[datos_basico][fecha_nacimiento]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="representante[datos_basico][ocupacion]">
                            <span class="required">*</span> 
                            Ocupación:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="representante[datos_basico][ocupacion]" disabled="true" class="form-control representante" id="representante_ocupacion" placeholder="Ocupación" aria-describedby="inputSuccess2Status"  value="{{ $representante->ocupacion or old('representante[datos_basico][ocupacion]') }}">

                            @if ($errors->has('representante[datos_basico][ocupacion]'))
                                <span class="text-danger">{{ $errors->first('representante[datos_basico][ocupacion]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="representante[datos_basico][direccion]">
                            <span class="required">*</span> 
                            Dirección:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="representante[datos_basico][direccion]" disabled="true" class="form-control representante" id="representante_direccion" placeholder="Dirección" aria-describedby="inputSuccess2Status"  value="{{ $representante->direccion or old('representante[datos_basico][direccion]') }}">

                            @if ($errors->has('representante[datos_basico][direccion]'))
                                <span class="text-danger">{{ $errors->first('representante[datos_basico][direccion]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="representante[datos_basico][nacionalidad]">
                            <span class="required">*</span> 
                            Nacionalidad:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="representante[datos_basico][nacionalidad]" disabled="true" class="form-control representante" id="representante_nacionalidad" placeholder="Nacionalidad" aria-describedby="inputSuccess2Status"  value="{{ $representante->nacionalidad or old('representante[datos_basico][nacionalidad]') }}">

                            @if ($errors->has('representante[datos_basico][nacionalidad]'))
                                <span class="text-danger">{{ $errors->first('representante[datos_basico][nacionalidad]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="representante[datos_basico][telefono_celular]">
                            <span class="required">*</span> 
                            Telefono celular:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="representante[datos_basico][telefono_celular]" disabled="true" class="form-control representante" id="representante_telefono_celular" placeholder="Telefono celular" aria-describedby="inputSuccess2Status"  value="{{ $representante->telefono_celular or old('representante[datos_basico][telefono_celular]') }}">

                            @if ($errors->has('representante[datos_basico][telefono_celular]'))
                                <span class="text-danger">{{ $errors->first('representante[datos_basico][telefono_celular]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="representante[datos_basico][telefono_fijo]">
                            <span class="required">*</span> 
                            Telefono fijo:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="representante[datos_basico][telefono_fijo]" disabled="true" class="form-control representante" id="representante_telefono_fijo" placeholder="Telefono fijo" aria-describedby="inputSuccess2Status"  value="{{ $representante->telefono_fijo or old('representante[datos_basico][telefono_fijo]') }}">

                            @if ($errors->has('representante[datos_basico][telefono_fijo]'))
                                <span class="text-danger">{{ $errors->first('representante[datos_basico][telefono_fijo]') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-center">
                            <a href={{ route('representante.index') }} class="btn btn-danger">Volver</a>
                            <button class="btn btn-default" type="reset">Limpiar</button>
                            <button class="btn btn-success" type="submit">Guardar</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
