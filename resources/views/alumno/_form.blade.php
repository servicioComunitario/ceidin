@if ($alumno->exists)
    <form id="form-alumno" class="form-horizontal form-label-left" action={{ route('alumno.update',  $alumno->id) }} method="POST">
        {{ method_field('PUT') }}
@else
    <form id="form-alumno" class="form-horizontal form-label-left" action={{ route('alumno.store') }} method="POST">
@endif
    {{ csrf_field() }}

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="row">
                {{-- alumno (se incluyen los datos personales)--}}
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Alumno</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="datos_basico[cedula]">
                                    <span class="required">*</span> 
                                    Cedula:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="datos_basico[cedula]" class="form-control " id="alumno_cedula" placeholder="Cedula" aria-describedby="inputSuccess2Status"  value="{{ $alumno->cedula or old('datos_basico[cedula]') }}">

                                    @if ($errors->has('datos_basico[cedula]'))
                                        <span class="text-danger">{{ $errors->first('datos_basico[cedula]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="datos_basico[nombre]">
                                    <span class="required">*</span> 
                                    Primer nombre:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="datos_basico[nombre]" class="form-control " id="alumno_nombre" placeholder="Primer nombre" aria-describedby="inputSuccess2Status"  value="{{ $alumno->nombre or old('datos_basico[nombre]') }}">

                                    @if ($errors->has('datos_basico[nombre]'))
                                        <span class="text-danger">{{ $errors->first('datos_basico[nombre]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="datos_basico[nombre2]">
                                    <span class="required"> </span> 
                                    Segundo nombre:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="datos_basico[nombre2]" class="form-control " id="alumno_nombre2" placeholder="Segundo nombre" aria-describedby="inputSuccess2Status"  value="{{ $alumno->nombre2 or old('datos_basico[nombre2]') }}">

                                    @if ($errors->has('datos_basico[nombre2]'))
                                        <span class="text-danger">{{ $errors->first('datos_basico[nombre2]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="datos_basico[apellido]">
                                    <span class="required">*</span> 
                                    Primer apellido:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="datos_basico[apellido]" class="form-control " id="alumno_apellido" placeholder="Primer apellido" aria-describedby="inputSuccess2Status"  value="{{ $alumno->apellido or old('datos_basico[apellido]') }}">

                                    @if ($errors->has('datos_basico[apellido]'))
                                        <span class="text-danger">{{ $errors->first('datos_basico[apellido]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="datos_basico[apellido2]">
                                    <span class="required"> </span> 
                                    Segundo apellido:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="datos_basico[apellido2]" class="form-control " id="alumno_apellido2" placeholder="Segundo apellido" aria-describedby="inputSuccess2Status"  value="{{ $alumno->apellido2 or old('datos_basico[apellido2]') }}">

                                    @if ($errors->has('datos_basico[apellido2]'))
                                        <span class="text-danger">{{ $errors->first('datos_basico[apellido2]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="datos_basico[sexo]">
                                    <span class="required">*</span> 
                                    Sexo:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select class="form-control" style="font-family: 'FontAwesome', Helvetica;" name="datos_basico[sexo]" id="alumno_sexo">
                                        <option value=''>Selecione su Sexo: &#xf228;</option>
				                        
                                        <option class="text-danger" value="F" @if ( $alumno->exists && $alumno->sexo == 'F' || old('datos_basico[sexo]')=="F") selected @endif id="alumno_sexo_f">Femenino &#xf221;</option>
                                        
                                        <option class="text-primary" value="M" @if ( $alumno->exists && $alumno->sexo == 'M' || old('datos_basico[sexo]')=="M") selected @endif id="alumno_sexo_m">Masculino &#xf222;</option>
                                    </select>
                                    
                                    @if ($errors->has('datos_basico[sexo]'))
                                        <span class="text-danger">{{ $errors->first('datos_basico[sexo]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="datos_basico[fecha_nacimiento]">
                                    <span class="required">*</span> 
                                        Fecha de nacimiento:
                                    </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="datos_basico[fecha_nacimiento]" class="form-control has-feedback-left " id="alumno_fecha_nacimiento" placeholder="Fecha de nacimiento" aria-describedby="inputSuccess2Status"  value="{{ $alumno->fecha_nacimiento or old('datos_basico[fecha_nacimiento]') }}">
                                    <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                    @if ($errors->has('datos_basico[fecha_nacimiento]'))
                                        <span class="text-danger">{{ $errors->first('datos_basico[fecha_nacimiento]') }}</span>
                                    @endif
                                </div>
                            </div>
{{-- 
                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="datos_basico[ocupacion]">
                                    <span class="required">*</span> 
                                    Ocupación:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="datos_basico[ocupacion]" class="form-control " id="alumno_ocupacion" placeholder="Ocupación" aria-describedby="inputSuccess2Status"  value="{{ $alumno->ocupacion or old('atos_basico[ocupacion]') }}">

                                    @if ($errors->has('atos_basico[ocupacion]'))
                                        <span class="text-danger">{{ $errors->first('atos_basico[ocupacion]') }}</span>
                                    @endif
                                </div>
                            </div>
 --}}
                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="datos_basico[direccion]">
                                    <span class="required">*</span> 
                                    Dirección:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="datos_basico[direccion]" class="form-control " id="alumno_direccion" placeholder="Dirección" aria-describedby="inputSuccess2Status"  value="{{ $alumno->direccion or old('datos_basico[direccion]') }}">

                                    @if ($errors->has('datos_basico[direccion]'))
                                        <span class="text-danger">{{ $errors->first('datos_basico[direccion]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="datos_basico[nacionalidad]">
                                    <span class="required">*</span> 
                                    Nacionalidad:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="datos_basico[nacionalidad]" class="form-control " id="alumno_nacionalidad" placeholder="Nacionalidad" aria-describedby="inputSuccess2Status"  value="{{ $alumno->nacionalidad or old('datos_basico[nacionalidad]') }}">

                                    @if ($errors->has('datos_basico[nacionalidad]'))
                                        <span class="text-danger">{{ $errors->first('datos_basico[nacionalidad]') }}</span>
                                    @endif
                                </div>
                            </div>
{{-- 
                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="datos_basico[telefono_celular]">
                                    <span class="required">*</span> 
                                    Telefono celular:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="datos_basico[telefono_celular]" class="form-control" id="alumno_telefono_celular" placeholder="Telefono celular" aria-describedby="inputSuccess2Status"  value="{{ $alumno->telefono_celular or old('datos_basico[telefono_celular]') }}">

                                    @if ($errors->has('datos_basico[telefono_celular]'))
                                        <span class="text-danger">{{ $errors->first('datos_basico[telefono_celular]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="datos_basico[telefono_fijo]">
                                    <span class="required">*</span> 
                                    Telefono fijo:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="datos_basico[telefono_fijo]" class="form-control" id="alumno_telefono_fijo" placeholder="Telefono fijo" aria-describedby="inputSuccess2Status"  value="{{ $alumno->telefono_fijo or old('datos_basico[telefono_fijo]') }}">

                                    @if ($errors->has('datos_basico[telefono_fijo]'))
                                        <span class="text-danger">{{ $errors->first('datos_basico[telefono_fijo]') }}</span>
                                    @endif
                                </div>
                            </div>
 --}}
                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="alumno[lugar_nacimiento]">
                                    <span class="required">*</span> 
                                    Lugar de nacimiento:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="alumno[lugar_nacimiento]" class="form-control" id="alumno_lugar_nacimiento" placeholder="Lugar de nacimiento" aria-describedby="inputSuccess2Status"  value="{{ $alumno->lugar_nacimiento or old('alumno[lugar_nacimiento]') }}">

                                    @if ($errors->has('alumno[lugar_nacimiento]'))
                                        <span class="text-danger">{{ $errors->first('alumno[lugar_nacimiento]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="alumno[procedencia]">
                                    <span class="required">*</span> 
                                    Procedencia:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="alumno[procedencia]" class="form-control" id="alumno_procedencia" placeholder="Procedencia" aria-describedby="inputSuccess2Status"  value="{{ $alumno->procedencia or old('alumno[procedencia]') }}">

                                    @if ($errors->has('alumno[procedencia]'))
                                        <span class="text-danger">{{ $errors->first('alumno[procedencia]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="alumno[nivel]">
                                    <span class="required">*</span> 
                                    Nivel:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" name="alumno[nivel]" class="form-control" id="alumno_nivel" placeholder="Nivel" aria-describedby="inputSuccess2Status"  value="{{ $alumno->nivel or old('alumno[nivel]') }}">

                                    @if ($errors->has('alumno[nivel]'))
                                        <span class="text-danger">{{ $errors->first('alumno[nivel]') }}</span>
                                    @endif
                                </div>
                            </div>
                            

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-1 text-center">
                                    <a href={{ route('alumno.index') }} class="btn btn-danger">Volver</a>
                                    <button class="btn btn-default" type="reset">Limpiar</button>
                                    <button class="btn btn-success" type="submit">Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> {{-- fin dato de los alumnos (esta incluido los datos basicos)--}}


                {{-- antecedente familiares --}}
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Antecedentes Familiares</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="antecedente_familiar[pareja_armonica]">
                                    <span class="required">*</span> 
                                    Pareja armonica:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="radio-inline">
                                        Si <input type="radio" class="flat" name="antecedente_familiar[pareja_armonica]" value="1" id="pareja_armonica_si" @if ("1" || old('antecedente_familiar[pareja_armonica]')=="1") checked @endif>
                                    </label>
                                    <label class="radio-inline">
                                        No <input type="radio" class="flat" name="antecedente_familiar[pareja_armonica]" required valure="0" id="pareja_armonica_no" @if ("0" || old('antecedente_familiar[pareja_armonica]')=="0") alumno @endif>
                                    </label>

                                    @if ($errors->has('antecedente_familiar[pareja_armonica]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('antecedente_familiar[pareja_armonica]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="antecedente_familiar[pareja_separada]">
                                    <span class="required">*</span> 
                                    Pareja separada:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="radio-inline">
                                        Si <input type="radio" class="flat" name="antecedente_familiar[pareja_separada]" value="1" id="pareja_separada_si" @if ("1" || old('antecedente_familiar[pareja_separada]')=="1") checked @endif>
                                    </label>
                                    <label class="radio-inline">
                                        No <input type="radio" class="flat" name="antecedente_familiar[pareja_separada]" required valure="0" id="pareja_separada_no" @if ("0" || old('antecedente_familiar[pareja_separada]')=="0") alumno @endif>
                                    </label>

                                    @if ($errors->has('antecedente_familiar[pareja_separada]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('antecedente_familiar[pareja_separada]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="antecedente_familiar[vive_con]">
                                    <span class="required">*</span> 
                                    El niño(a) vive con:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" placeholder="El niño(a) vive con" name="antecedente_familiar[vive_con]" id="vive_con" value="{{ $alumno->vive_con or old('antecedente_familiar[vive_con]') }}">

                                    @if ($errors->has('antecedente_familiar[vive_con]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('antecedente_familiar[vive_con]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="antecedente_familiar[hermanos]">
                                    <span class="required">*</span> 
                                    Hermanos:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Hermanos" name="antecedente_familiar[hermanos]" id="hermanos" value="{{ $alumno->hermanos or old('antecedente_familiar[hermanos]') }}">

                                    @if ($errors->has('antecedente_familiar[hermanos]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('antecedente_familiar[hermanos]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="antecedente_familiar[religion]">
                                    <span class="required">*</span> 
                                    Religion:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Religion" name="antecedente_familiar[religion]" id="religion" value="{{ $alumno->religion or old('antecedente_familiar[religion]') }}">

                                    @if ($errors->has('antecedente_familiar[religion]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('antecedente_familiar[religion]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="antecedente_familiar[lugar_grupo_familiar]">
                                    <span class="required">*</span> 
                                    Lugar en el grupo familiar:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Lugar en el grupo familiar" name="antecedente_familiar[lugar_grupo_familiar]" id="lugar_grupo_familiar" value="{{ $alumno->lugar_grupo_familiar or old('antecedente_familiar[lugar_grupo_familiar]') }}">

                                    @if ($errors->has('antecedente_familiar[lugar_grupo_familiar]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('antecedente_familiar[lugar_grupo_familiar]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="antecedente_familiar[otros_adultos_casa]">
                                    <span class="required">*</span> 
                                    Otros adultos en casa:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Otros adultos en casa" name="antecedente_familiar[otros_adultos_casa]" id="otros_adultos_casa" value="{{ $alumno->otros_adultos_casa or old('antecedente_familiar[otros_adultos_casa]') }}">

                                    @if ($errors->has('antecedente_familiar[otros_adultos_casa]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('antecedente_familiar[otros_adultos_casa]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="antecedente_familiar[cuidado_por]">
                                    <span class="required">*</span> 
                                    El niño(a) es cuidado por:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" placeholder="El niño(a) es cuidado por" name="antecedente_familiar[cuidado_por]" id="cuidado_por" value="{{ $alumno->cuidado_por or old('antecedente_familiar[cuidado_por]') }}">

                                    @if ($errors->has('antecedente_familiar[cuidado_por]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('antecedente_familiar[cuidado_por]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="antecedente_familiar[tipo_vivienda]">
                                    <span class="required">*</span> 
                                    Tipo de vivienda:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Tipo de vivienda" name="antecedente_familiar[tipo_vivienda]" id="tipo_vivienda" value="{{ $alumno->tipo_vivienda or old('antecedente_familiar[tipo_vivienda]') }}">

                                    @if ($errors->has('antecedente_familiar[tipo_vivienda]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('antecedente_familiar[tipo_vivienda]') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div> {{-- fin antecedentes familiares--}}

                {{-- antecedente medico --}}
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Antecedentes medicos</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="antecedente_medico[embrazo_unico]">
                                    <span class="required">*</span> 
                                    Embarazo unico:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="radio-inline">
                                        Si <input type="radio" class="flat" name="antecedente_medico[embrazo_unico]" value="1" id="embrazo_unico_si" @if ("1" || old('antecedente_medico[embrazo_unico]')=="1") checked @endif>
                                    </label>
                                    <label class="radio-inline">
                                        No <input type="radio" class="flat" name="antecedente_medico[embrazo_unico]" required valure="0" id="embrazo_unico_no" @if ("0" || old('antecedente_medico[embrazo_unico]')=="0") alumno @endif>
                                    </label>

                                    @if ($errors->has('antecedente_medico[embrazo_unico]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('antecedente_medico[embrazo_unico]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="antecedente_medico[parto_normal]">
                                    <span class="required">*</span> 
                                    Parto normal:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="radio-inline">
                                        Si <input type="radio" class="flat" name="antecedente_medico[parto_normal]" value="1" id="parto_normal_si" @if ("1" || old('ntecedente_medico[parto_normal]')=="1") checked @endif>
                                    </label>
                                    <label class="radio-inline">
                                        No <input type="radio" class="flat" name="antecedente_medico[parto_normal]" required valure="0" id="parto_normal_no" @if ("0" || old('ntecedente_medico[parto_normal]')=="0") alumno @endif>
                                    </label>

                                    @if ($errors->has('ntecedente_medico[parto_normal]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('ntecedente_medico[parto_normal]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="antecedente_medico[prematuro]">
                                    <span class="required">*</span> 
                                    Prepaturo:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label class="radio-inline">
                                        Si <input type="radio" class="flat" name="antecedente_medico[prematuro]" value="1" id="prematuro" @if ("1" || old('antecedente_medico[prematuro]')=="1") checked @endif>
                                    </label>
                                    <label class="radio-inline">
                                        No <input type="radio" class="flat" name="antecedente_medico[prematuro]" required valure="0" id="prematuro" @if ("0" || old('antecedente_medico[prematuro]')=="0") alumno @endif>
                                    </label>

                                    @if ($errors->has('antecedente_medico[prematuro]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('antecedente_medico[prematuro]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="antecedente_medico[problema_durante_parto]">
                                    <span class="required">*</span> 
                                    Problema durante el parto:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Problema durante el parto" name="antecedente_medico[problema_durante_parto]" id="problema_durante_parto" value="{{ $alumno->antecedenteMedico->problema_durante_parto or old('antecedente_medico[problema_durante_parto]') }}">

                                    @if ($errors->has('antecedente_medico[problema_durante_parto]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('antecedente_medico[problema_durante_parto]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="antecedente_medico[desarrollo_primer_anio]">
                                    <span class="required">*</span> 
                                    Desarrollo primer año:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Desarrollo primer año" name="antecedente_medico[desarrollo_primer_anio]" id="desarrollo_primer_anio" value="{{ $alumno->antecedenteMedico->desarrollo_primer_anio or old('antecedente_medico[desarrollo_primer_anio]') }}">

                                    @if ($errors->has('antecedente_medico[desarrollo_primer_anio]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('antecedente_medico[desarrollo_primer_anio]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="antecedente_medico[desarrollo_posterior]">
                                    <span class="required">*</span> 
                                    Desarrollo posterior:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Desarrollo posterior" name="antecedente_medico[desarrollo_posterior]" id="desarrollo_posterior" value="{{ $alumno->antecedenteMedico->desarrollo_posterior or old('antecedente_medico[desarrollo_posterior]') }}">

                                    @if ($errors->has('antecedente_medico[desarrollo_posterior]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('antecedente_medico[desarrollo_posterior]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="antecedente_medico[problemas_lenguaje]">
                                    <span class="required">*</span> 
                                    Problemas lenguaje:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Problemas lenguaje" name="antecedente_medico[problemas_lenguaje]" id="problemas_lenguaje" value="{{ $alumno->antecedenteMedico->problemas_lenguaje or old('antecedente_medico[problemas_lenguaje]') }}">

                                    @if ($errors->has('antecedente_medico[problemas_lenguaje]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('antecedente_medico[problemas_lenguaje]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="antecedente_medico[edad_control_esfinteres]">
                                    <span class="required">*</span> 
                                    Edad control esfinteres:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Edad control esfinteres" name="antecedente_medico[edad_control_esfinteres]" id="edad_control_esfinteres" value="{{ $alumno->antecedenteMedico->edad_control_esfinteres or old('antecedente_medico[edad_control_esfinteres]') }}">

                                    @if ($errors->has('antecedente_medico[edad_control_esfinteres]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('antecedente_medico[edad_control_esfinteres]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="antecedente_medico[alergias]">
                                    <span class="required">*</span> 
                                    Alergias:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Alergias" name="antecedente_medico[alergias]" id="alergias" value="{{ $alumno->antecedenteMedico->alergias or old('antecedente_medico[alergias]') }}">
                                    @if ($errors->has('antecedente_medico[alergias]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('antecedente_medico[alergias]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="antecedente_medico[medicamento_fiebre]">
                                    <span class="required">*</span> 
                                    Medicamento para la fiebre:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Medicamento para la fiebre" name="antecedente_medico[medicamento_fiebre]" id="medicamento_fiebre" value="{{ $alumno->antecedenteMedico->medicamento_fiebre or old('antecedente_medico[medicamento_fiebre]') }}">
                                    @if ($errors->has('antecedente_medico[medicamento_fiebre]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('antecedente_medico[medicamento_fiebre]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="antecedente_medico[enfermedades]">
                                    <span class="required">*</span> 
                                    Enfermedades:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Enfermedades" name="antecedente_medico[enfermedades]" id="enfermedades" value="{{ $alumno->antecedenteMedico->enfermedades or old('antecedente_medico[enfermedades]') }}">
                                    @if ($errors->has('antecedente_medico[enfermedades]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('antecedente_medico[enfermedades]') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div> {{-- fin antecedentes medicos--}}

                {{-- otros datos --}}
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Otros Datos</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="otros_datos[conductas_socioemocionales]">
                                    <span class="required">*</span> 
                                    Conductas socioemocionales:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Conductas socioemocionales" name="otros_datos[conductas_socioemocionales]" id="conductas_socioemocionales" value="{{ $alumno->otrosDatos->conductas_socioemocionales or old('otros_datos[conductas_socioemocionales]') }}">

                                    @if ($errors->has('otros_datos[conductas_socioemocionales]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('otros_datos[conductas_socioemocionales]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="otros_datos[juego]">
                                    <span class="required">*</span> 
                                    Juegos:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Juego" name="otros_datos[juego]" id="juego" value="{{ $alumno->otrosDatos->juego or old('otros_datos[juego]') }}">

                                    @if ($errors->has('otros_datos[juego]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('otros_datos[juego]') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-5 col-sm-5 col-xs-12" for="otros_datos[habitos_independencia]">
                                    <span class="required">*</span> 
                                    Habitos de independencia:
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" class="form-control" placeholder="Habitos de independencia" name="otros_datos[habitos_independencia]" id="habitos_independencia" value="{{ $alumno->otrosDatos->habitos_independencia or old('otros_datos[habitos_independencia]') }}">

                                    @if ($errors->has('otros_datos[habitos_independencia]'))
                                        <br/>
                                        <span class="text-danger">{{ $errors->first('otros_datos[habitos_independencia]') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>{{-- fin de otros datos --}}

            </div> {{-- fin row --}}
        </div> {{-- fin primer col-md-6 --}}

        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="row">
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
                        <div class="form-group">
                            <label class="control-label col-md-5 col-sm-5 col-xs-12" for="representante[datos_basico][cedula]">
                                <span class="required">*</span> 
                                Cedula:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="representante[datos_basico][cedula]" class="form-control" id="representante_cedula" placeholder="Cedula" aria-describedby="inputSuccess2Status"  value="{{ $alumno->representante->cedula or old('representante[datos_basico][cedula]') }}">

                                @if ($errors->has('representante[datos_basico][cedula]'))
                                    <span class="text-danger">{{ $errors->first('representante[datos_basico][cedula]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5 col-sm-5 col-xs-12" for="nombre">
                                <span class="required">*</span> 
                                Primer nombre:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="representante_nombre" type="text" name="representante[datos_basico][nombre]" class="form-control representante" disabled="true" placeholder="Primer nombre" aria-describedby="inputSuccess2Status"  value="{{ $alumno->representante->nombre or old('representante[datos_basico][nombre]') }}">

                                @if ($errors->has('representante[datos_basico][nombre]'))
                                    <span class="text-danger">{{ $errors->first('representante[datos_basico][nombre]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5 col-sm-5 col-xs-12" for="representante[datos_basico][nombre2]">
                                <span class="required"> </span> 
                                Segundo nombre:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="representante[datos_basico][nombre2]" class="form-control representante" disabled="true" id="representante_nombre2" placeholder="Segundo nombre" aria-describedby="inputSuccess2Status"  value="{{ $alumno->representante->nombre2 or old('representante[datos_basico][nombre2]') }}">

                                @if ($errors->has('representante[datos_basico][nombre2]'))
                                    <span class="text-danger">{{ $errors->first('representante[datos_basico][nombre2]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5 col-sm-5 col-xs-12" for="representante[datos_basico][apellido]">
                                <span class="required">*</span> 
                                Primer apellido:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="representante[datos_basico][apellido]" class="form-control representante" disabled="true" id="representante_apellido" placeholder="Primer apellido" aria-describedby="inputSuccess2Status"  value="{{ $alumno->representante->apellido or old('apellido') }}">

                                @if ($errors->has('representante[datos_basico][apellido]'))
                                    <span class="text-danger">{{ $errors->first('representante[datos_basico][apellido]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5 col-sm-5 col-xs-12" for="representante[datos_basico][apellido2]">
                                <span class="required"> </span> 
                                Segundo apellido:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" disabled="true" name="representante[datos_basico][apellido2]" class="form-control representante" id="representante_apellido2" placeholder="Segundo apellido" aria-describedby="inputSuccess2Status"  value="{{ $alumno->representante->apellido2 or old('representante[datos_basico][apellido2]') }}">

                                @if ($errors->has('representante[datos_basico][apellido2]'))
                                    <span class="text-danger">{{ $errors->first('representante[datos_basico][apellido2]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5 col-sm-5 col-xs-12" for="representante[datos_basico][sexo]">
                                <span class="required">*</span> 
                                Sexo:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control representante" style="font-family: 'FontAwesome', Helvetica;" name="representante[datos_basico][sexo]" id="representante_sexo" disabled="true">

                                    <option value=''>Selecione su Sexo: &#xf228;</option>

                                    <option class="text-danger" value="F" @if ( ($alumno->representante->sexo === 'F') || ( old('padre[datos_basico][sexo]') === 'F' )) selected @endif >
                                        Femenino &#xf221;
                                    </option>

                                    <option class="text-primary" value="M" @if ( ($alumno->representante->sexo == 'M') || ( old('padre[datos_basico][sexo]') === 'M' ) ) selected @endif >
                                        Masculino &#xf222;
                                    </option>

                                </select>
                                
                                @if ($errors->has('representante[datos_basico][sexo]'))
                                    <span class="text-danger">{{ $errors->first('representante[datos_basico][sexo]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5 col-sm-5 col-xs-12" for="representante[datos_basico][fecha_nacimiento]">
                                <span class="required">*</span> 
                                    Fecha de nacimiento:
                                </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="representante[datos_basico][fecha_nacimiento]" disabled="true" class="form-control has-feedback-left representante" id="representante_fecha_nacimiento" placeholder="Fecha de nacimiento" aria-describedby="inputSuccess2Status"  value="{{ $alumno->representante->fecha_nacimiento or old('representante[datos_basico][fecha_nacimiento]') }}">
                                <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                @if ($errors->has('representante[datos_basico][fecha_nacimiento]'))
                                    <span class="text-danger">{{ $errors->first('representante[datos_basico][fecha_nacimiento]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5 col-sm-5 col-xs-12" for="representante[parentesco]">
                                <span class="required">*</span> 
                                Parentesco:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="representante[parentesco]" disabled="true" class="form-control representante" id="representante_parentesco" placeholder="Parentesco" aria-describedby="inputSuccess2Status"  value="{{ $alumno->representante->parentesco or old('representante[parentesco]') }}">

                                @if ($errors->has('representante[parentesco]'))
                                    <span class="text-danger">{{ $errors->first('representante[parentesco]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5 col-sm-5 col-xs-12" for="representante[datos_basico][ocupacion]">
                                <span class="required">*</span> 
                                Ocupación:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="representante[datos_basico][ocupacion]" disabled="true" class="form-control representante" id="representante_ocupacion" placeholder="Ocupación" aria-describedby="inputSuccess2Status"  value="{{ $alumno->representante->ocupacion or old('representante[datos_basico][ocupacion]') }}">

                                @if ($errors->has('representante[datos_basico][ocupacion]'))
                                    <span class="text-danger">{{ $errors->first('representante[datos_basico][ocupacion]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5 col-sm-5 col-xs-12" for="representante[datos_basico][direccion]">
                                <span class="required">*</span> 
                                Dirección:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="representante[datos_basico][direccion]" disabled="true" class="form-control representante" id="representante_direccion" placeholder="Dirección" aria-describedby="inputSuccess2Status"  value="{{ $alumno->representante->direccion or old('representante[datos_basico][direccion]') }}">

                                @if ($errors->has('representante[datos_basico][direccion]'))
                                    <span class="text-danger">{{ $errors->first('representante[datos_basico][direccion]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5 col-sm-5 col-xs-12" for="representante[datos_basico][nacionalidad]">
                                <span class="required">*</span> 
                                Nacionalidad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="representante[datos_basico][nacionalidad]" disabled="true" class="form-control representante" id="representante_nacionalidad" placeholder="Nacionalidad" aria-describedby="inputSuccess2Status"  value="{{ $alumno->representante->nacionalidad or old('representante[datos_basico][nacionalidad]') }}">

                                @if ($errors->has('representante[datos_basico][nacionalidad]'))
                                    <span class="text-danger">{{ $errors->first('representante[datos_basico][nacionalidad]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5 col-sm-5 col-xs-12" for="representante[datos_basico][telefono_celular]">
                                <span class="required">*</span> 
                                Telefono celular:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="representante[datos_basico][telefono_celular]" disabled="true" class="form-control representante" id="representante_telefono_celular" placeholder="Telefono celular" aria-describedby="inputSuccess2Status"  value="{{ $alumno->representante->telefono_celular or old('representante[datos_basico][telefono_celular]') }}">

                                @if ($errors->has('representante[datos_basico][telefono_celular]'))
                                    <span class="text-danger">{{ $errors->first('representante[datos_basico][telefono_celular]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-5 col-sm-5 col-xs-12" for="representante[datos_basico][telefono_fijo]">
                                <span class="required">*</span> 
                                Telefono fijo:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="representante[datos_basico][telefono_fijo]" disabled="true" class="form-control representante" id="representante_telefono_fijo" placeholder="Telefono fijo" aria-describedby="inputSuccess2Status"  value="{{ $alumno->representante->telefono_fijo or old('representante[datos_basico][telefono_fijo]') }}">

                                @if ($errors->has('representante[datos_basico][telefono_fijo]'))
                                    <span class="text-danger">{{ $errors->first('representante[datos_basico][telefono_fijo]') }}</span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div> {{-- fin representante--}}

            </div> {{-- fin row --}}
        </div> {{-- fin segundo col-md-6 --}}


        {{-- Padre --}}
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="row">
                {{-- padre --}}
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
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="padre[datos_basico][cedula]">
                                <span class="required">*</span> 
                                Cedula:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="padre[datos_basico][cedula]" class="form-control" id="padre_cedula" placeholder="Cedula" aria-describedby="inputSuccess2Status" value="{{ old('padre[datos_basico][cedula]') }}" data-sexo='M'>

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
                                <input type="text" name="padre[grado_instruccion]" disabled="true" class="form-control" id="padre_grado_instruccion" placeholder="Ocupación" aria-describedby="inputSuccess2Status"  value="{{ old('padre[grado_instruccion]') }}">

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
                                    Si <input type="radio" class="flat" name="padre[difunto]" disabled="true" value="1" id="padre_difunto_si" @if ( old('padre[difunto]')=="1") checked @endif>
                                </label>
                                <label class="radio-inline">
                                    No <input type="radio" class="flat" name="padre[difunto]" disabled="true" value="0" id="padre_difunto_no" @if ( old('padre[difunto]')=="0" ) checked @endif>
                                </label>

                                @if ($errors->has('padre[difunto]'))
                                    <br/>
                                    <span class="text-danger">{{ $errors->first('padre[difunto]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="padre[datos_basico][nombre]">
                                <span class="required">*</span> 
                                Primer nombre:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="padre[datos_basico][nombre]" class="form-control padre" disabled="true" id="padre_nombre" placeholder="Primer nombre" aria-describedby="inputSuccess2Status"  value="{{ $alumno->padre()->nombre or old('padre[datos_basico][nombre]') }}">

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
                                <input type="text" name="padre[datos_basico][nombre2]" class="form-control padre" disabled="true" id="padre_nombre2" placeholder="Segundo nombre" aria-describedby="inputSuccess2Status"  value="{{ old('padre[datos_basico][nombre2]') }}">

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
                                <input type="text" name="padre[datos_basico][apellido]" class="form-control padre" disabled="true" id="padre_apellido" placeholder="Primer apellido" aria-describedby="inputSuccess2Status"  value="{{ old('padre[datos_basico][apellido]') }}">
                                
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
                                <input type="text" name="padre[datos_basico][apellido2]" class="form-control padre" disabled="true" id="padre_apellido2" placeholder="Segundo apellido" aria-describedby="inputSuccess2Status"  value="{{ old('padre[datos_basico][apellido2]') }}">

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

                                    <option class="text-danger" value="F" @if ( ( old('padre[datos_basico][sexo]') === 'F' )) selected @endif >Femenino &#xf221;</option>

                                    <option class="text-primary" value="M" @if ( ( old('padre[datos_basico][sexo]') === 'M' ) ) selected @endif >Masculino &#xf222;</option>
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
                                <input type="text" name="padre[datos_basico][fecha_nacimiento]" class="form-control has-feedback-left  padre" id="padre_fecha_nacimiento" disabled="true" placeholder="Fecha de nacimiento" aria-describedby="inputSuccess2Status"  value="{{ old('padre[datos_basico][fecha_nacimiento]') }}">
                                
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
                                <input type="text" name="padre[datos_basico][ocupacion]" class="form-control padre" disabled="true" id="padre_ocupacion" placeholder="Ocupación" aria-describedby="inputSuccess2Status"  value="{{ old('padre[datos_basico][ocupacion]') }}">

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
                                <input type="text" name="padre[datos_basico][direccion]" class="form-control padre" disabled="true" id="padre_direccion" placeholder="Dirección" aria-describedby="inputSuccess2Status"  value="{{  old('padre[datos_basico][direccion]') }}">

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
                                <input type="text" name="padre[datos_basico][nacionalidad]" class="form-control padre" disabled="true" id="padre_nacionalidad" placeholder="Nacionalidad" aria-describedby="inputSuccess2Status"  value="{{ old('padre[datos_basico][nacionalidad]') }}">

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
                                <input type="text" name="padre[datos_basico][telefono_celular]" class="form-control padre" disabled="true" id="padre_telefono_celular" placeholder="Telefono celular" aria-describedby="inputSuccess2Status"  value="{{ old('padre[datos_basico][telefono_celular]') }}">

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
                                <input type="text" name="padre[datos_basico][telefono_fijo]" class="form-control padre" disabled="true" id="padre_telefono_fijo" placeholder="Telefono fijo" aria-describedby="inputSuccess2Status"  value="{{ old('padre[datos_basico][telefono_fijo]') }}">

                                @if ($errors->has('padre[datos_basico][telefono_fijo]'))
                                    <span class="text-danger">{{ $errors->first('padre[datos_basico][telefono_fijo]') }}</span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div> {{-- fin de los datos del padre --}}


            </div> {{-- fin del row --}}
        </div> {{-- fin del col --}}


        {{-- Madre --}}
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="row">
                {{-- madre --}}
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Madre</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <br />
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="madre[datos_basico][cedula]">
                                <span class="required">*</span> 
                                Cedula:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="madre[datos_basico][cedula]" class="form-control" id="madre_cedula" placeholder="Cedula" aria-describedby="inputSuccess2Status" value="{{ old('madre[datos_basico][cedula]') }}" data-sexo='F'>

                                @if ($errors->has('madre[datos_basico][cedula]'))
                                    <span class="text-danger">{{ $errors->first('madre[datos_basico][cedula]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="madre[grado_instruccion]">
                                <span class="required">*</span> 
                                Grado de instrucción:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="madre[grado_instruccion]" disabled="true" class="form-control" id="madre_grado_instruccion" placeholder="Ocupación" aria-describedby="inputSuccess2Status"  value="{{ old('madre[grado_instruccion]') }}">

                                @if ($errors->has('madre[grado_instruccion]'))
                                    <span class="text-danger">{{ $errors->first('madre[grado_instruccion]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="madre[difunto]">
                                <span class="required">*</span> 
                                Difunto:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label class="radio-inline">
                                    Si <input type="radio" class="flat" name="madre[difunto]" disabled="true" value="1" id="madre_difunto_si" @if ( old('madre[difunto]')=="1") checked @endif>
                                </label>
                                <label class="radio-inline">
                                    No <input type="radio" class="flat" name="madre[difunto]" disabled="true" value="0" id="madre_difunto_no" @if ( old('madre[difunto]')=="0" ) checked @endif>
                                </label>

                                @if ($errors->has('madre[difunto]'))
                                    <br/>
                                    <span class="text-danger">{{ $errors->first('madre[difunto]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="madre[datos_basico][nombre]">
                                <span class="required">*</span> 
                                Primer nombre:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="madre[datos_basico][nombre]" class="form-control madre" disabled="true" id="madre_nombre" placeholder="Primer nombre" aria-describedby="inputSuccess2Status"  value="{{ $alumno->madre()->nombre or old('madre[datos_basico][nombre]') }}">

                                @if ($errors->has('madre[datos_basico][nombre]'))
                                    <span class="text-danger">{{ $errors->first('madre[datos_basico][nombre]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="madre[datos_basico][nombre2]">
                                <span class="required"> </span> 
                                Segundo nombre:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="madre[datos_basico][nombre2]" class="form-control madre" disabled="true" id="madre_nombre2" placeholder="Segundo nombre" aria-describedby="inputSuccess2Status"  value="{{ old('madre[datos_basico][nombre2]') }}">

                                @if ($errors->has('madre[datos_basico][nombre2]'))
                                    <span class="text-danger">{{ $errors->first('madre[datos_basico][nombre2]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="madre[datos_basico][apellido]">
                                <span class="required">*</span> 
                                Primer apellido:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="madre[datos_basico][apellido]" class="form-control madre" disabled="true" id="madre_apellido" placeholder="Primer apellido" aria-describedby="inputSuccess2Status"  value="{{ old('madre[datos_basico][apellido]') }}">
                                
                                @if ($errors->has('madre[datos_basico][apellido]'))
                                    <span class="text-danger">{{ $errors->first('madre[datos_basico][apellido]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="madre[datos_basico][apellido2]">
                                <span class="required"> </span> 
                                Segundo apellido:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="madre[datos_basico][apellido2]" class="form-control madre" disabled="true" id="madre_apellido2" placeholder="Segundo apellido" aria-describedby="inputSuccess2Status"  value="{{ old('madre[datos_basico][apellido2]') }}">

                                @if ($errors->has('madre[datos_basico][apellido2]'))
                                    <span class="text-danger">{{ $errors->first('madre[datos_basico][apellido2]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="madre[datos_basico][sexo]">
                                <span class="required">*</span> 
                                Sexo:
                            </label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control madre" style="font-family: 'FontAwesome', Helvetica;" name="madre[datos_basico][sexo]" disabled="true" id="madre_sexo">
                                    <option value=''>Selecione su Sexo: &#xf228;</option>

                                    <option class="text-danger" value="F" @if ( ( old('madre[datos_basico][sexo]') === 'F' )) selected @endif >Femenino &#xf221;</option>

                                    <option class="text-primary" value="M" @if ( ( old('madre[datos_basico][sexo]') === 'M' ) ) selected @endif >Masculino &#xf222;</option>
                                </select>
                                
                                @if ($errors->has('madre[datos_basico][sexo]'))
                                    <span class="text-danger">{{ $errors->first('madre[datos_basico][sexo]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="madre[datos_basico][fecha_nacimiento]">
                                <span class="required">*</span> 
                                Fecha de nacimiento:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="madre[datos_basico][fecha_nacimiento]" class="form-control has-feedback-left  madre" id="madre_fecha_nacimiento" disabled="true" placeholder="Fecha de nacimiento" aria-describedby="inputSuccess2Status"  value="{{ old('madre[datos_basico][fecha_nacimiento]') }}">
                                
                                <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                @if ($errors->has('madre[datos_basico][fecha_nacimiento]'))
                                    <span class="text-danger">{{ $errors->first('madre[datos_basico][fecha_nacimiento]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="madre[datos_basico][ocupacion]">
                                <span class="required">*</span> 
                                Ocupación:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="madre[datos_basico][ocupacion]" class="form-control madre" disabled="true" id="madre_ocupacion" placeholder="Ocupación" aria-describedby="inputSuccess2Status"  value="{{ old('madre[datos_basico][ocupacion]') }}">

                                @if ($errors->has('madre[datos_basico][ocupacion]'))
                                    <span class="text-danger">{{ $errors->first('madre[datos_basico][ocupacion]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="madre[datos_basico][direccion]">
                                <span class="required">*</span> 
                                Dirección:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="madre[datos_basico][direccion]" class="form-control madre" disabled="true" id="madre_direccion" placeholder="Dirección" aria-describedby="inputSuccess2Status"  value="{{  old('madre[datos_basico][direccion]') }}">

                                @if ($errors->has('madre[datos_basico][direccion]'))
                                    <span class="text-danger">{{ $errors->first('madre[datos_basico][direccion]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="madre[datos_basico][nacionalidad]">
                                <span class="required">*</span> 
                                Nacionalidad:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="madre[datos_basico][nacionalidad]" class="form-control madre" disabled="true" id="madre_nacionalidad" placeholder="Nacionalidad" aria-describedby="inputSuccess2Status"  value="{{ old('madre[datos_basico][nacionalidad]') }}">

                                @if ($errors->has('madre[datos_basico][nacionalidad]'))
                                    <span class="text-danger">{{ $errors->first('madre[datos_basico][nacionalidad]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="madre[datos_basico][telefono_celular]">
                                <span class="required">*</span> 
                                Telefono celular:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="madre[datos_basico][telefono_celular]" class="form-control madre" disabled="true" id="madre_telefono_celular" placeholder="Telefono celular" aria-describedby="inputSuccess2Status"  value="{{ old('madre[datos_basico][telefono_celular]') }}">

                                @if ($errors->has('madre[datos_basico][telefono_celular]'))
                                    <span class="text-danger">{{ $errors->first('madre[datos_basico][telefono_celular]') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="madre[datos_basico][telefono_fijo]">
                                <span class="required">*</span> 
                                Telefono fijo:
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="madre[datos_basico][telefono_fijo]" class="form-control madre" disabled="true" id="madre_telefono_fijo" placeholder="Telefono fijo" aria-describedby="inputSuccess2Status"  value="{{ old('madre[datos_basico][telefono_fijo]') }}">

                                @if ($errors->has('madre[datos_basico][telefono_fijo]'))
                                    <span class="text-danger">{{ $errors->first('madre[datos_basico][telefono_fijo]') }}</span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div> {{-- fin de los datos del madre --}}

            </div> {{-- fin del row --}}
        </div> {{-- fin del col --}}

    </div>
</form>
