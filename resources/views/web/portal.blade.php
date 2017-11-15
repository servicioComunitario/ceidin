<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sitio Web de Ceidin.">

    <meta name="twitter:card" value="summary">

    <meta property="og:title" content="{{ config('app.name', 'Laravel') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:image" content="{{ asset('images/header-xs.jpg') }}" />
    <meta property="og:description" content="Sitio Web de Ceidin." />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icono-->
    <link rel="icon" type="image/png" href="{{ asset('images/birrete.ico') }}" />

    <!-- Bootstrap CSS 3.3.7-->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Fuentes -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/kaushan-script.css') }}" rel="stylesheet" type="text/css">

    <!-- Portal CSS -->
    <link href="{{ asset('css/portal.css') }}" rel="stylesheet" type="text/css">

</head>

<body id="page-top" class="index">

    <!-- Navegación -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container">
            <!-- Logo e Ícono Menú-->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Navegación</span> Menú <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top"><i class="fa fa-graduation-cap"></i> Ceidin</a>
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
                    <li><a href="#">Ayuda</a></li>
                    <li><a href="{{ route('login') }}">Entrar</a></li>
                    
                </ul>
            </div>
            <!-- /.Menú de Navegación -->
        </div>
    </nav>
    <!-- /.Navegación -->

    <!-- Header -->
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
    <!-- /.Header -->

    <!-- Sección de Noticias-->
    <section id="noticias" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="seccion-encabezado">Noticias</h2>
                </div>
            </div>
            <div class="row">
                <!-- Slider -->
                <div class="col-xs-12 col-md-8">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Items -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="{{ env('APP_ENV')=='local' ? asset('images/temp/business.jpg') : 'http://lorempixel.com/1280/720/business' }}" alt="Business">
                                <div class="carousel-caption">
                                    <div class="noticia-item" data-toggle="modal" data-target="#noticiaModal1">
                                        <div class="noticia-link">
                                            <div class="noticia-hover">
                                                <div class="noticia-hover-content">
                                                    <span class="fa-stack fa-3x">
                                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                                        <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, harum.</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam veritatis error nihil? Nemo deserunt, velit cupiditate consequatur, adipisci deleniti et.
                                                <span class="pull-right"><b>09-02-2011</b></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <img src="{{ env('APP_ENV')=='local' ? asset('images/temp/technics.jpg') : 'http://lorempixel.com/1280/720/technics' }}" alt="Technics">
                                <div class="carousel-caption">
                                    <div class="noticia-item">
                                        <div class="noticia-link" data-toggle="modal" data-target="#noticiaModal2">
                                            <div class="noticia-hover">
                                                <div class="noticia-hover-content">
                                                    <span class="fa-stack fa-3x">
                                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                                        <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <h4>Lorem ipsum dolor sit amet, consectetur.</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni sed id aliquid debitis atque dolores? Nobis temporibus nulla architecto suscipit. 
                                                <span class="pull-right"><b>09-02-2011</b></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <img src="{{ env('APP_ENV')=='local' ? asset('images/temp/city.jpg') : 'http://lorempixel.com/1280/720/city' }}" alt="City">
                                <div class="carousel-caption">
                                    <div class="noticia-item" data-toggle="modal" data-target="#noticiaModal3">
                                        <div class="noticia-link">
                                            <div class="noticia-hover">
                                                <div class="noticia-hover-content">
                                                    <span class="fa-stack fa-3x">
                                                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                                        <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <h4>Lorem ipsum dolor sit amet, consectetur adipisicing.</h4>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste quos, facilis nisi earum obcaecati provident ipsa odio! At, unde, obcaecati.
                                                <span class="pull-right"><b>09-02-2011</b></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.Items -->
                        </div>

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
                <!-- /.Slider -->

                <!-- Panel de Noticias Anteriores -->
                <div class="col-xs-12 col-md-4 panel-noticias-anteriores">
                    <div class="carta-noticia">
                        <div class="noticia-item" data-toggle="modal" data-target="#noticiaModal4">
                            <div class="noticia-link">
                                <div class="noticia-hover">
                                    <div class="noticia-hover-content">
                                        <span class="fa-stack fa-3x">
                                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                            <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                </div>
                                <b>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, quae.</b>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic nostrum aut neque libero consequatur dolor, sed adipisci ipsam. Et, unde!
                                    <span class="pull-right"><i>09-02-2011</i></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="carta-noticia">
                        <div class="noticia-item" data-toggle="modal" data-target="#noticiaModal4">
                            <div class="noticia-link">
                                <div class="noticia-hover">
                                    <div class="noticia-hover-content">
                                        <span class="fa-stack fa-3x">
                                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                            <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                </div>
                                <b>Este es título de una noticia Hover</b>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic nostrum aut neque libero consequatur dolor, sed adipisci ipsam. Et, unde!
                                    <span class="pull-right"><i>09-02-2011</i></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="carta-noticia">
                        <div class="noticia-item" data-toggle="modal" data-target="#noticiaModal4">
                            <div class="noticia-link">
                                <div class="noticia-hover">
                                    <div class="noticia-hover-content">
                                        <span class="fa-stack fa-3x">
                                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                            <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                </div>
                                <b>Este es título de una noticia</b>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus velit tempore accusantium officiis voluptatibus similique illum, maxime perspiciatis alias quis.
                                    <span class="pull-right"><i>09-02-2011</i></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="carta-noticia">
                        <div class="noticia-item" data-toggle="modal" data-target="#noticiaModal4">
                            <div class="noticia-link">
                                <div class="noticia-hover">
                                    <div class="noticia-hover-content">
                                        <span class="fa-stack fa-3x">
                                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                            <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                </div>
                                <b>Este es título de una noticia</b>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, beatae voluptas magni quasi tenetur. Sunt reprehenderit a voluptatum nihil modi. 
                                    <span class="pull-right"><i>09-02-2011</i></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="carta-noticia">
                        <div class="noticia-item" data-toggle="modal" data-target="#noticiaModal4">
                            <div class="noticia-link">
                                <div class="noticia-hover">
                                    <div class="noticia-hover-content">
                                        <span class="fa-stack fa-3x">
                                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                            <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </div>
                                </div>
                                <b>Este es título de una noticia</b>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum magnam natus mollitia voluptatum cupiditate aperiam id ea provident voluptas quae? 
                                    <span class="pull-right"><i>09-02-2011</i></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.Panel de Noticias Anteriores -->
            </div>
        </div>
    </section>
    <!-- /.Sección de Noticias -->

    <!-- Sección de Filosofía de Gestión -->
    <section id="filosofia">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="seccion-encabezado">Filosofía de Gestión</h2>
                    <h3 class="seccion-subencabezado text-muted">Des.</h3>
                </div>
            </div>
            <div class="row text-center">
                <!-- Misión -->
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-rocket fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="filosofia-encabezado">Misión</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
                <!-- /.Misión -->
                <!-- Visión -->
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="filosofia-encabezado">Visión</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
                <!-- /.Visión -->
                <!-- Valores -->
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-heart fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="filosofia-encabezado">Valores</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                </div>
                <!-- /.Valores -->
            </div>
        </div>
    </section>
    <!-- /.Sección de Filosofía de Gestión -->

    <!-- Sección de Reseña Histórica-->
    <section id="resena" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="seccion-encabezado">Reseña Histórica</h2>
                    <h3 class="seccion-subencabezado text-muted">Descarga nuestra reseña histórica <a href="#">aquí</a>.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-image-o">
                                <h4>Diciembre 2000</h4>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading">Título</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image-o">
                                <h4>2010 - 2015</h4>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading">Título</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-image-o">
                                <h4>Enero 2017</h4>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4 class="subheading">Título</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image-o">
                                <h4>Noviembre 2017</h4>
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <!-- <h4>July 2014</h4> -->
                                    <h4 class="subheading">Título</h4>
                                </div>
                                <div class="timeline-body">
                                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                </div>
                            </div>
                        </li>
                        <li class="timeline-inverted">
                            <div class="timeline-image">
                                <h4>Se Parte
                                    <br>De Nuestra
                                    <br>Historia!</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- /.Sección de Reseña Histórica-->

    <!-- Seccion de Ubícanos -->
    <section id="ubicanos">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="seccion-encabezado">Ubícanos</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    {!! env('APP_ENV')!='local' ? '<iframe src="http://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3948.375416033793!2d-62.767180585218696!3d8.265379594052824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8dcbf94693b5f6ad%3A0x2705e64c715d8eb3!2sAvenida+Atlantico%2C+Ciudad+Guayana+8050%2C+Bol%C3%ADvar!5e0!3m2!1ses-419!2sve!4v1488600424533" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>' : '' !!}
                </div>
            </div>
        </div>
    </section>
    <!-- /.Seccion de Ubícanos -->

    <!-- Sección de Equipo de Desarrollo-->
    <section id="equipo" class="bg-light-gray hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="seccion-encabezado">Equipo de Desarrollo</h2>
                    <h3 class="seccion-subencabezado text-muted">Des.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="equipo-miembro">
                        <img src="images/equipo/beatriz.jpg" class="img-responsive img-circle" alt="">
                        <h4>Beatriz Gómez</h4>
                        <p class="text-muted">Cargo/Rol</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="http://facebook.com/beatriz.santoya" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="equipo-miembro">
                        <img src="images/equipo/deisyuris.jpg" class="img-responsive img-circle" alt="">
                        <h4>Deisyuris Guzmán</h4>
                        <p class="text-muted">Cargo/Rol</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="http://facebook.com/dey.guzman.75" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="equipo-miembro">
                        <img src="images/equipo/jesus.jpg" class="img-responsive img-circle" alt="">
                        <h4>Jesús Torres</h4>
                        <p class="text-muted">Cargo/Rol</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="http://github.com/jjtc07" target="_blank"><i class="fa fa-github"></i></a>
                            </li>
                            <li>
                                <a href="http://facebook.com/jjtc07" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="http://linkedin.com/in/jes%C3%BAs-torres-6b9516142" target="_blank"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="equipo-miembro">
                        <img src="images/equipo/roiner.jpg" class="img-responsive img-circle" alt="">
                        <h4>Roiner Hernández</h4>
                        <p class="text-muted">Cargo/Rol</p>
                        <ul class="list-inline social-buttons">
                            <li>
                                <a href="http://github.com/Roiner994" target="_blank"><i class="fa fa-github"></i></a>
                            </li>
                            <li>
                                <a href="http://facebook.com/Roiner.L" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="http://linkedin.com/in/roiner-hernandez-a6314894" target="_blank"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="equipo-miembro">
                        <img src="images/equipo/stalin.jpg" class="img-responsive img-circle" alt="">
                        <h4>Stalin Sánchez</h4>
                        <p class="text-muted">Cargo/Rol</p>
                        <ul class="list-inline social-buttons">
                            <li>
                                <a href="http://github.com/stalinscj" target="_blank"><i class="fa fa-github"></i></a>
                            </li>
                            <li><a href="http://facebook.com/stalinscj" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="http://linkedin.com/in/stalinscj" target="_blank"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">

                    <p class="large text-muted">
                        <q><i> Llegar juntos es el principio. Mantenerse juntos, es el progreso. Trabajar juntos es el éxito.</i></q> Henry Ford
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- /.Sección de Equipo de Desarrollo-->

    <!-- Footer-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; {{ config('app.name', 'Laravel').' '.date('Y') }}</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a class="page-scroll" href="#equipo" onclick="$('#equipo').removeClass('hidden');">Equipo de Desarrollo</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- /.Footer-->

    <!-- Noticias Modal -->
    <div class="noticia-modal modal fade" id="noticiaModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Título de la Noticias./ -->
                                <h2 class="noticia-modal-titulo">Título de la noticia <span title="Cerrar Noticia" class="close-modal pull-right text-muted" data-dismiss="modal">&times;</span></h2>
                                <!-- Resumen de la Noticia./ -->
                                <p class="noticia-modal-resumen text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <!-- Imgagen de la Noticia./ -->
                                <img class="img-responsive img-centered noticia-modal-imagen" src="{{ env('APP_ENV')=='local' ? asset('images/temp/business.jpg') : 'http://lorempixel.com/1280/720/business' }}" alt="Business">
                                <!-- Cuerpo de la Noticia -->
                                <div class="noticia-modal-cuerpo">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                    <p>
                                        <strong>Lorem ipsum dolor sit amet, consectetur adipisicing.</strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<a href="#">Lorem.com</a>, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, eos.<a href="#">here</a>.
                                    </p>
                                </div>
                                
                                <!-- /.Cuerpo de la Noticia -->
                                <ul class="list-inline text-center">
                                    <li><i>Autor:</i> <b>Nombre Apellido</b></li>
                                    <li><i>Lugar:</i> <b>Puerto Ordaz</b></li>
                                    <li><i>Fecha:</i> <b>01-02-2017</b></li>
                                </ul>
                                <div class="noticia-modal-cerrar-div">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar Noticia</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="noticia-modal modal fade" id="noticiaModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Título de la Noticias./ -->
                                <h2 class="noticia-modal-titulo">Título de la noticia <span title="Cerrar Noticia" class="close-modal pull-right text-muted" data-dismiss="modal">&times;</span></h2>
                                <!-- Resumen de la Noticia./ -->
                                <p class="noticia-modal-resumen text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <!-- Imgagen de la Noticia./ -->
                                <img class="img-responsive img-centered noticia-modal-imagen" src="{{ env('APP_ENV')=='local' ? asset('images/temp/technics.jpg') : 'http://lorempixel.com/1280/720/technics' }}" alt="Technics">
                                <!-- Cuerpo de la Noticia -->
                                <div class="noticia-modal-cuerpo">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                    <p>
                                        <strong>Lorem ipsum dolor sit amet, consectetur adipisicing.</strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<a href="#">Lorem.com</a>, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, eos.<a href="#">here</a>.
                                    </p>
                                </div>
                                
                                <!-- /.Cuerpo de la Noticia -->
                                <ul class="list-inline text-center">
                                    <li><i>Autor:</i> <b>Nombre Apellido</b></li>
                                    <li><i>Lugar:</i> <b>Puerto Ordaz</b></li>
                                    <li><i>Fecha:</i> <b>01-02-2017</b></li>
                                </ul>
                                <div class="noticia-modal-cerrar-div">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar Noticia</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="noticia-modal modal fade" id="noticiaModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="modal-body">
                                <!-- Título de la Noticias./ -->
                                <h2 class="noticia-modal-titulo">Título de la noticia <span title="Cerrar Noticia" class="close-modal pull-right text-muted" data-dismiss="modal">&times;</span></h2>
                                <!-- Resumen de la Noticia./ -->
                                <p class="noticia-modal-resumen text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                <!-- Imgagen de la Noticia./ -->
                                <img class="img-responsive img-centered noticia-modal-imagen" src="{{ env('APP_ENV')=='local' ? asset('images/temp/city.jpg') : 'http://lorempixel.com/1280/720/city' }}" alt="City">
                                <!-- Cuerpo de la Noticia -->
                                <div class="noticia-modal-cuerpo">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                    </p>
                                    <p>
                                        <strong>Lorem ipsum dolor sit amet, consectetur adipisicing.</strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<a href="#">Lorem.com</a>, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, eos.<a href="#">here</a>.
                                    </p>
                                </div>
                                
                                <!-- /.Cuerpo de la Noticia -->
                                <ul class="list-inline text-center">
                                    <li><i>Autor:</i> <b>Nombre Apellido</b></li>
                                    <li><i>Lugar:</i> <b>Puerto Ordaz</b></li>
                                    <li><i>Fecha:</i> <b>01-02-2017</b></li>
                                </ul>
                                <div class="noticia-modal-cerrar-div">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar Noticia</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="noticiaModal4" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Título de la noticia</h4>
                </div>
                <div class="modal-body">
                    <img class="img-responsive img-centered " src="{{ env('APP_ENV')=='local' ? asset('images/temp/animals.jpg') : 'http://lorempixel.com/1280/720/' }}" alt="Animals">
                    <br/>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <p>
                        
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>

                    <ul class="list-inline text-center">
                        <li><i>Autor:</i> <b>Nombre Apellido</b></li>
                        <li><i>Lugar:</i> <b>Puerto Ordaz</b></li>
                        <li><i>Fecha:</i> <b>01-02-2017</b></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>
    <!-- /.Noticias Modal -->

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

   <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Easing JQuery -->
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>

    <!-- Theme JavaScript -->
    <script src="{{ asset('js/portal.js') }}"></script>
</body>

</html>
