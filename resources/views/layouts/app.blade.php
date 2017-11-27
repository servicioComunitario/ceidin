<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Icono-->
    <link rel="icon" type="image/png" href="{{ asset('images/birrete.ico') }}" />
    <!-- Fuente Kaushan Script -->
    <link href="{{ asset('css/kaushan-script.css') }}"" rel="stylesheet" type="text/css">
    <!-- Bootstrap CSS 3.3.7-->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('css/font-awesome.min.css') }}"" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('css/nprogress.css') }}" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet"/>
    <!-- Css personalizados -->
    @yield("css")
    <!-- Custom Theme Style -->
    <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet">

</head>
<body class="nav-md" style="background-color: #2A3F54">
    <div class="container body" >
        <div class="main_container" >
            <div class="col-md-3 left_col menu_fixed">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ route('home')}}" class="site_title">
                            <i class="fa fa-graduation-cap"></i>
                            <span>{{ config('app.name', 'Laravel') }}</span>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_info menu_section">
                            <h3>
                                {{ Auth::user()->email }}
                            </h3>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                     <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                {{-- Portal --}}
                                <li>
                                    <a href="{{ url('/') }}">
                                        <i class="fa fa-laptop fa-fw"></i> 
                                        Portal web 
                                        <span class="fa fa-mail-reply"></span>
                                    </a>
                                </li>
                                {{-- /.Portal --}}

                                {{-- Home --}}
                                <li>
                                    <a>
                                        <i class="fa fa-home fa-fw"></i> 
                                        Home 
                                        <span class="fa fa-chevron-down"></span>
                                    </a>
                                    <ul class="nav child_menu">
                                        <li><a href="index.html">Dashboard</a></li>
                                        <li><a href="index2.html">Dashboard2</a></li>
                                        <li><a href="index3.html">Dashboard3</a></li>
                                    </ul>
                                </li>
                                {{-- /.Home --}}

                                {{-- Portal --}}
                                <li>
                                    <a href="{{ route('noticia.index') }}">
                                        <i class="fa fa-newspaper-o fa-fw"></i> 
                                        Noticias
                                    </a>
                                </li>
                                {{-- /.Portal --}}

                                {{-- Administración --}}
                                <li>
                                    <a>
                                        <i class="fa fa-gears fa-fw"></i> 
                                        Administración 
                                        <span class="fa fa-chevron-down"></span>
                                    </a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('periodo.index') }}">Periodos Escolares</a></li>
                                        <li><a href="{{ route('padre.index') }}">Padres</a></li>
                                        <li><a href="{{ route('usuario.index') }}">Usuarios</a></li>
                                    </ul>
                                </li>
                                {{-- /.Administración --}}
                                
                                {{-- Seguridad --}}
                                <li>
                                    <a>
                                        <i class="fa fa-lock fa-fw"></i> 
                                        Seguridad 
                                        <span class="fa fa-chevron-down"></span>
                                    </a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('acceso.index') }}">Accesos</a></li>
                                        <li><a href="{{ route('rol.index') }}">Roles</a></li>
                                    </ul>
                                </li>
                                {{-- /.Seguridad --}}
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Salir" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                            </form>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>
            
            <!-- page content -->
            <div class="right_col" role="main" style="min-height: initial;">
                @include('layouts._messages')
                @yield("contenido")

            </div>
            <!-- /page content -->
            
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('js/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('js/nprogress.js') }}"></script>
    <!-- jQuery custom content scroller -->
    <script src="{{ asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <!-- Scripts personalizados -->
    @yield("js")

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('js/custom.min.js') }}"></script>

</body>
</html>
