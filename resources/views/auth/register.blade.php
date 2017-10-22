<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>{{ config('app.name') }}</title>

    <!-- Icono-->
    <link rel="icon" type="image/png" href={{ asset('images/birrete.ico') }} />
    
    <!-- Bootstrap -->
    <link href={{ asset("css/bootstrap.min.css") }} rel="stylesheet">
    <!-- Font Awesome -->
    <link href={{ asset("css/font-awesome.min.css") }} rel="stylesheet">
    <!-- NProgress -->
    <link href={{ asset("css/nprogress.css") }} rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href={{ asset("css/custom.min.css") }} rel="stylesheet">

</head>

<body class="login">
<div class="login_wrapper">
    <div class="animate form login_form"">
        <section class="login_content" style="padding-top: 0;">
            <form method="post" action="{{ url('/register') }}" style="margin-top: 0;">
                {!! csrf_field() !!}
                
                <h1 style="margin-top: 0;">Crear Cuenta</h1>
                
                <div class="form-group has-feedback{{ $errors->has('cedula') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" name="cedula" value="{{ old('cedula') }}" placeholder="Ingrese su Cédula">
                    <span class="fa fa-id-card form-control-feedback"></span>
                    
                    @if ($errors->has('cedula'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cedula') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('nombre') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" placeholder="Ingrese su Nombre">
                    <span class="fa fa-user form-control-feedback"></span>
                    
                    @if ($errors->has('nombre'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('apellido') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" name="apellido" value="{{ old('apellido') }}" placeholder="Ingrese su Apellido">
                    <span class="fa fa-user-o form-control-feedback"></span>
                    
                    @if ($errors->has('apellido'))
                        <span class="help-block">
                            <strong>{{ $errors->first('apellido') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('sexo') ? ' has-error' : '' }}">
                    <select class="form-control" style="font-family: 'FontAwesome', Helvetica;" name="sexo">
                        <option value=''>Selecione su Sexo: &#xf228;</option>
                        <option class="text-danger" value="F" @if (old('sexo')=="F") selected @endif >Femenino &#xf221;</option>
                        <option class="text-primary" value="M" @if (old('sexo')=="M") selected @endif >Masculino &#xf222;</option>
                    </select>

                    @if ($errors->has('sexo'))
                        <span class="help-block">
                            <strong>{{ $errors->first('sexo') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('fecha_nacimiento') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" placeholder="Fecha de Nacimiento dd-mm-aaaa">
                    <span class="fa fa-birthday-cake form-control-feedback"></span>
                    
                    @if ($errors->has('apellido'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fecha_nacimiento') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Ingrese su Email">
                    <span class="fa fa-envelope form-control-feedback"></span>
                    
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" name="password" placeholder="Ingrese una Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Repita la Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    
                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
                <div>
                    <button class="btn btn-default submit" >Registrar</button>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="separator">
                    <p class="change_link">¿Ya posee una cuenta?
                        <a href="{{ url('/login') }}" class="to_register">
                            <b> 
                                Iniciar Sesión 
                                <i class="fa fa-external-link-square text-primary" aria-hidden="true"></i>
                            </b>
                        </a>
                    </p>
                    
                    <div class="clearfix"></div>
                    <br />
                    
                    <div>
                        <a href="/"><h1><i class="fa fa-graduation-cap"></i> Ceidin</h1></a>
                        <p>©2017 Ceidin.</p>
                    </div>
                </div>
            </form>
        </section>
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

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('js/custom.min.js') }}"></script>
    
</body>
</html>