<!DOCTYPE html>
<html lang="es-VE">

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta name="google-site-verification" content="cFCM0HW0yF0MTiqS1JbbkGubvNtLNzszQt2ORucFVV0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index,follow">
    <title>{{ config('app.name', 'Laravel') }} | Centro de Educación Inicial Desarrollo Integral del Niño</title>
    <meta name="DC.title" content="{{ config('app.name', 'Laravel') }} | Centro de Educación Inicial Desarrollo Integral del Niño" />
    <meta name="description" content='El Centro de Educación Inicial Desarrollo Integral del Niño (CEIDIN) funciona desde 1979, cuando se separa del Centro Preescolar “Año Internacional del Niño”, iniciando actividades con 16 secciones distribuidas en dos turnos bajo la metodología de "Aula Abierta", este funcionaba en dos módulos ubicados; uno en la avenida tres, sector I y el otro en la calle 18 sector II Unare II de Puerto Ordaz, Estado Bolívar.'>
    <meta name="keywords" content="ceidin, preescolar, escuela, educación, uneg, puerto ordaz, servicio comunitario, unare">

    <meta name="twitter:card" value="summary">

    <meta property="og:title" content="{{ config('app.name', 'Laravel') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:image" content="{{ asset('images/header-xs.jpg') }}" />
    <meta property="og:description" content="Sitio Web del Centro de Educación Inicial Desarrollo Integral del Niño (CEIDIN) Puerto Ordaz, Estado Bolívar" />


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
    @include('portal._navbar')
    <!-- /.Navegación -->

    <!-- Header -->
    @include('portal._header')

    <!-- Sección de Noticias-->
    @include('portal._noticias')

    <!-- Sección de Filosofía de Gestión -->
    @include('portal._filosofia')

    <!-- Sección de Reseña Histórica-->
    @include('portal._resena')

    <!-- Seccion de Ubícanos -->
    @include('portal._ubicanos')

    <!-- Sección de Equipo de Desarrollo-->
    @include('portal._equipo')

    <!-- Footer-->
    @include('portal._footer')

    <!-- Noticias Modal -->
    @include('portal._modalPrimario')
    @include('portal._modalSecundario')

    <!-- jQuery -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>

   <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Easing JQuery -->
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>

    <!-- Theme JavaScript -->
    <script src="{{ asset('js/portal.js') }}"></script>
    
    <script type="text/javascript">var urlGetNoticia = '{{ route('noticia.show', -1) }}';</script>
    <script src="{{ asset('js/portal/index.js') }}"></script>
</body>

</html>
