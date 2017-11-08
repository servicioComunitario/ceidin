<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
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

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="datos_basico[cedula]">
                            <span class="required">*</span> 
                            Cedula:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="datos_basico[cedula]" class="form-control " id="cedula" placeholder="Cedula" aria-describedby="inputSuccess2Status"  value="{{ $representante->datosBasico->cedula or old('cedula') }}">

                            @if ($errors->has('cedula'))
                                <span class="text-danger">{{ $errors->first('cedula') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">
                            <span class="required">*</span> 
                            Primer nombre:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="datos_basico[nombre]" class="form-control " id="nombre" placeholder="Primer nombre" aria-describedby="inputSuccess2Status"  value="{{ $representante->datosBasico->nombre or old('nombre') }}">

                            @if ($errors->has('nombre'))
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="datos_basico[nombre2]">
                            <span class="required"> </span> 
                            Segundo nombre:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="datos_basico[nombre2]" class="form-control " id="nombre2" placeholder="Segundo nombre" aria-describedby="inputSuccess2Status"  value="{{ $representante->datosBasico->nombre2 or old('nombre2') }}">

                            @if ($errors->has('nombre2'))
                                <span class="text-danger">{{ $errors->first('nombre2') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="datos_basico[apellido]">
                            <span class="required">*</span> 
                            Primer apellido:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="datos_basico[apellido]" class="form-control " id="apellido" placeholder="Primer apellido" aria-describedby="inputSuccess2Status"  value="{{ $representante->datosBasico->apellido or old('apellido') }}">

                            @if ($errors->has('apellido'))
                                <span class="text-danger">{{ $errors->first('apellido') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="datos_basico[apellido2]">
                            <span class="required"> </span> 
                            Segundo apellido:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="datos_basico[apellido2]" class="form-control " id="apellido2" placeholder="Segundo apellido" aria-describedby="inputSuccess2Status"  value="{{ $representante->datosBasico->apellido2 or old('apellido2') }}">

                            @if ($errors->has('apellido2'))
                                <span class="text-danger">{{ $errors->first('apellido2') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="datos_basico[sexo]">
                            <span class="required">*</span> 
                            Sexo:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <select class="form-control" style="font-family: 'FontAwesome', Helvetica;" name="datos_basico[sexo]">
                                <option value=''>Selecione su Sexo: &#xf228;</option>
                                <option class="text-danger" value="F" @if (old('sexo')=="F") selected @endif >Femenino &#xf221;</option>
                                <option class="text-primary" value="M" @if (old('sexo')=="M") selected @endif >Masculino &#xf222;</option>
                            </select>
                            
                            @if ($errors->has('sexo'))
                                <span class="text-danger">{{ $errors->first('sexo') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="datos_basico[fecha_nacimiento]">
                            <span class="required">*</span> 
                                Fecha de nacimiento:
                            </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="datos_basico[fecha_nacimiento]" class="form-control has-feedback-left " id="fecha_nacimiento" placeholder="Fecha de nacimiento" aria-describedby="inputSuccess2Status"  value="{{ $representante->datosBasico->fecha_nacimiento or old('fecha_nacimiento') }}">
                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                            @if ($errors->has('fecha_nacimiento'))
                                <span class="text-danger">{{ $errors->first('fecha_nacimiento') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="representante[parentesco]">
                            <span class="required">*</span> 
                            Parentesco:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="representante[parentesco]" class="form-control " id="parentesco" placeholder="Parentesco" aria-describedby="inputSuccess2Status"  value="{{ $representante->parentesco or old('parentesco') }}">

                            @if ($errors->has('parentesco'))
                                <span class="text-danger">{{ $errors->first('parentesco') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="datos_basico[ocupacion]">
                            <span class="required">*</span> 
                            Ocupación:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="datos_basico[ocupacion]" class="form-control " id="ocupacion" placeholder="Ocupación" aria-describedby="inputSuccess2Status"  value="{{ $representante->datosBasico->ocupacion or old('ocupacion') }}">

                            @if ($errors->has('ocupacion'))
                                <span class="text-danger">{{ $errors->first('ocupacion') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="datos_basico[direccion]">
                            <span class="required">*</span> 
                            Dirección:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="datos_basico[direccion]" class="form-control " id="direccion" placeholder="Dirección" aria-describedby="inputSuccess2Status"  value="{{ $representante->datosBasico->direccion or old('direccion') }}">

                            @if ($errors->has('direccion'))
                                <span class="text-danger">{{ $errors->first('direccion') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="datos_basico[nacionalidad]">
                            <span class="required">*</span> 
                            Nacionalidad:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="datos_basico[nacionalidad]" class="form-control " id="nacionalidad" placeholder="Nacionalidad" aria-describedby="inputSuccess2Status"  value="{{ $representante->datosBasico->nacionalidad or old('nacionalidad') }}">

                            @if ($errors->has('nacionalidad'))
                                <span class="text-danger">{{ $errors->first('nacionalidad') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="datos_basico[telefono_celular]">
                            <span class="required">*</span> 
                            Telefono celular:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="datos_basico[telefono_celular]" class="form-control" id="telefono_celular" placeholder="Telefono celular" aria-describedby="inputSuccess2Status"  value="{{ $representante->datosBasico->telefono_celular or old('telefono_celular') }}">

                            @if ($errors->has('telefono_celular'))
                                <span class="text-danger">{{ $errors->first('telefono_celular') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="datos_basico[telefono_fijo]">
                            <span class="required">*</span> 
                            Telefono fijo:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="datos_basico[telefono_fijo]" class="form-control" id="telefono_fijo" placeholder="Telefono fijo" aria-describedby="inputSuccess2Status"  value="{{ $representante->datosBasico->telefono_fijo or old('telefono_fijo') }}">

                            @if ($errors->has('telefono_fijo'))
                                <span class="text-danger">{{ $errors->first('telefono_fijo') }}</span>
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