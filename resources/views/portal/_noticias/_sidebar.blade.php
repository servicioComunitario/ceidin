<div class="col-xs-12 col-md-4 panel-noticias-anteriores">
    @foreach ($noticias->sortByDesc('fecha') as $noticia)
        <div class="carta-noticia" >
            <div class="noticia-item" onclick="getNoticia({{ $noticia->id }}, false)">
                <div class="noticia-link">
                    <div class="noticia-hover">
                        <div class="noticia-hover-content">
                            <span class="fa-stack fa-3x">
                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                    </div>
                    <b>{{ $noticia->titulo }}</b>
                    <p>
                        {{ $noticia->resumen }}
                        <span class="pull-right"><i>{{ $noticia->fecha }}</i></span>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>