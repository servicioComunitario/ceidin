<nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container">
        <!-- Logo e Ícono Menú-->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Navegación</span> Menú <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top"><i class="fa fa-graduation-cap"></i> {{ config('app.name', 'Laravel') }}</a>
        </div>
        <!-- /.Logo e Ícono Menú-->

        <!-- Menú de Navegación -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden"><a href="#page-top"></a></li>
                <li><a class="page-scroll" href="#noticias">Noticias</a></li>
                <li><a class="page-scroll" href="#filosofia">Filosofía</a></li>
                <li><a class="page-scroll" href="#resena">Reseña</a></li>
                <li><a class="page-scroll" href="#ubicanos">Ubícanos</a></li>
                <li><a href={{ asset('docs/nota-prensa.pdf') }} download>Ayuda</a></li>
                <li><a href="{{ route('login') }}">Entrar</a></li>
                
            </ul>
        </div>
        <!-- /.Menú de Navegación -->
    </div>
</nav>