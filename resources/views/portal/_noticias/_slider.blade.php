<div class="col-xs-12 col-md-8">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Items -->
        <div class="carousel-inner">
            @foreach ($noticiasSlider as $noticia)
                @if ($noticia->principal)
                    <div class="item {{ !$loop->index ? 'active': '' }}">
                        <img src="{{ $noticia->ruta_imagen }}" alt="{{ $noticia->titulo }}">
                        <div class="carousel-caption" onclick="getNoticia({{ $noticia->id }}, true)">
                            <div class="noticia-item">
                                <div class="noticia-link">
                                    <div class="noticia-hover">
                                        <div class="noticia-hover-content">
                                            <span class="fa-stack fa-3x">
                                                <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                                <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <h4>{{ $noticia->titulo }}</h4>
                                    <p>
                                        {!! $noticia->resumen !!}
                                        <span class="pull-right"><b>{{ $noticia->fecha }}</b></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <!-- /.Items -->

        <!-- Controles < > -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Siguiente</span>
        </a>
        <!-- /.Controles < > -->
    </div>
</div>