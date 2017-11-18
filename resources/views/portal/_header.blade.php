<header>
    <div class="container">
        <div class="intro-text">
            <div class="intro-lead-in">Bienvenido!</div>
            <div class="intro-heading">Promoviendo valores</div>
            
            @guest
                <a href="{{ route('login') }}" class="btn btn-xl"><i class="fa fa-sign-in"></i>
                    Iniciar Sesión
                </a>
            @else
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('form-salir').submit();" class="btn btn-xl">
                    <i class="fa fa-sign-out"></i> 
                    Cerrar Sesión
                </a>

                <form id="form-salir" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endguest

            <a href="#" class="page-scroll btn btn-xl"><i class="fa fa-download"></i> Manual de Ayuda</a>
        </div>
    </div>
</header>