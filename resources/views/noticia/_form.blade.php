<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Noticia</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                @if ($noticia->exists)
                    <form id="form-noticia" class="form-horizontal form-label-left" action={{ route('noticia.update',  $noticia->id) }} method="POST" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                @else
                    <form id="form-noticia" class="form-horizontal form-label-left" action={{ route('noticia.store') }} method="POST" enctype="multipart/form-data">
                @endif
                    {{ csrf_field() }}
                    {{-- Título de la noticia --}}
                    <div class="form-group">
                        <label class="col-xs-12" for="titulo"><span class="required">*</span> Título:</label>
                        <div class="col-xs-12">
                            <input type="text" required="required" name="titulo" class="form-control col-md-7 col-xs-12" id="titulo" placeholder="Título del noticia (Máximo 10 palabras)" value="{!! $noticia->titulo or old('titulo') !!}">
                            @if ($errors->has('titulo'))
                                <span class="text-danger">{{ $errors->first('titulo') }}</span>
                            @endif
                        </div>
                    </div>
                    {{-- Resumen de la noticia --}}
                    <div class="form-group">
                        <label class="col-xs-12" for="resumen"><span class="required">*</span> Resumen:</label>
                        <div class="col-xs-12">
                            <textarea id="resumen" required="required" name="resumen" placeholder="Resumen del noticia (Mámimo 20 palabras)" class="resizable_textarea form-control" style="height: 60px">{!!  $noticia->resumen or old('resumen') !!}</textarea>
                            @if ($errors->has('resumen'))
                                <span class="text-danger">{{ $errors->first('resumen') }}</span>
                            @endif
                        </div>
                    </div>
                    {{-- Imagen de la Noticia --}}
                    <div class="form-group">
                        <label class="col-xs-12" for="imagen"><span class="required">*</span> Imagen:</label>
                        <div class="input-group col-xs-12">
                            <span class="input-group-btn">
                                <span class="btn btn-default btn-archivo">
                                    Buscar: <input type="file" accept="image/*" id="imagen" name="imagen">
                                </span>
                            </span>
                            <input type="text" class="form-control" name="imagen-nombre" required="required" readonly value="{!!  $noticia->imagen !!}">
                        </div>
                        <div class="col-xs-12">
                            <img class="img img-rounded img-thumbnail" id='img-preview' src="{{ asset($noticia->ruta_imagen) }}" />
                        </div>
                    </div>
                    {{-- Principal Noticia --}}
                    <div class="form-group">
                        <label class="col-xs-12" for="principal"><span class="required">*</span> Principal:</label>
                        <div class="col-xs-12">
                            <label class="radio-inline">
                                SÍ <input required="required" type="radio" class="flat" name="principal" id="principalSi" value="1"  @if ($noticia->principal || old('principal')) checked @endif>
                            </label>
                            <label class="radio-inline">
                                NO <input type="radio" class="flat" name="principal" id="principalNo" value="0" @if ($noticia->principal=="0" || old('principal')=="0") checked @endif>
                            </label>
                            @if ($errors->has('principal'))
                                <br/>
                                <span class="text-danger">{{ $errors->first('principal') }}</span>
                            @endif
                        </div>
                    </div>
                    {{-- Orden de la noticia --}}
                    <div class="form-group">
                        <label class="col-xs-12" for="orden"><span class="required">*</span> Orden:</label>
                        <div class="col-xs-12">
                            <input required="required" type="text" name="orden" class="form-control col-md-7 col-xs-12" id="orden" placeholder="Orden de la Noticia" value="{{ $noticia->orden or old('orden') }}">
                            @if ($errors->has('orden'))
                                <span class="text-danger">{{ $errors->first('orden') }}</span>
                            @endif
                        </div>
                    </div>
                    {{-- Contenido de la noticia --}}
                    <div class="form-group">
                        <label class="col-xs-12" for="orden"><span class="required">*</span> Contenido:</label>
                        <div class="col-xs-12">
                            <textarea name="contenido" id="contenido">
                                {!! $noticia->contenido or old('contenido') !!}
                            </textarea>
                            {{-- <script type="text/javascript"> var contenido = "{!! $noticia->contenido or old('contenido') !!}"</script> --}}
                            {{-- <div id="editor"></div> --}}
                            @if ($errors->has('contenido'))
                                <span class="text-danger">{{ $errors->first('contenido') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3 text-center">
                            <a href={{ route('noticia.index') }} class="btn btn-danger">Volver</a>
                            <button class="btn btn-default" type="reset">Limpiar</button>
                            <button class="btn btn-success" type="submit">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>