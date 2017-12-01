<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Constancia de estudio</title>
	<style type="text/css">
		body{
			padding: 1cm 1cm 0cm 2cm;
		}
		h6{
			text-align: center;
			margin:4px;
		}
		h2{
			text-align: center;
			text-decoration: underline;
		}
		p{
			text-indent: 30px;
			text-align: justify;
		}
		h4{
			text-align: center;
		}
		.linea{
			text-decoration: overline;
		}
		img{
			position: absolute;
			left: 10%;
			width: 100px;	
		}
		.mayuscula{
			text-transform: uppercase;
		}
	</style>
</head>
<body>
	<hr>
	<img src="images/header-xs-2.jpg" alt="">
	<div>
		<h6>REPUBLICA BOLIVARIANA DE VENEZUELA</h6>
		<h6>MINISTERIO DEL PODER POPULAR PARA LA EDUCACIÓN</h6>
		<h6>C.E.I. "DESARROLLO INTEGRAL DEL NIÑO"</h6>
		<h6>CÓDIGO:004130070</h6>
		<h6>RIF:J-308017124</h6>
		<h6>PUERTO ORDAZ - ESTADO BOLÍVAR</h6>
	</div>
	<br>
	<br>
	<br>
	<h2>CONSTANCIA DE RETIRO</h2>
	<br>
	<br>
	<p>
			  El suscrito Director(a) {{$director->datosBasico->nombre}}  {{$director->datosBasico->apellido}} con dedula n° {{$director->datosBasico->cedula}} del centro de Educacion Inicial "Desarrollo Integral del Niño", que funciona en Puerto Ordaz, Estado Bolivar, por medio de la presente, hace constar que el alumno(a):{{$alumno->datosBasico->nombre}} {{$alumno->datosBasico->apellido}} Sexo {{$alumno->datosBasico->sexo}}, de {{$edad}} años con cedula escolar n° {{$alumno->datosBasico->cedula}}, inscrito para cursar el periodo {{$inscripcion->docentePeriodo->seccion}} correspondiente al Año Escolar {{$inscripcion->periodo->fecha_inicio}} ha sido retirado por su Representante, por motivo: Viaje.
	</p>

	Constancia que se expide a peticion de la parte interesada a los {{$dia}} Días del mes de {{$mes}} del año {{$ano}}
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>

	<div>
		<h4 class="linea mayuscula">LICENCIADO(A) {{$director->datosBasico->nombre}}  {{$director->datosBasico->apellido}}</h4>
		<h4>DIRECTOR(A) DEL PLANTEL</h4>
	</div>
	
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<hr>
	<h6>UNARE II, SECTOR II, CALLE 18, A 30 MTS DEL LICEO ANDRES BELLO, PUERTO ORDAZ ESTADO BOLIVAR.</h6>
	<h6>Telefonos: 0286-9521157 - 0424-9198777 - e-mail: ceidin_unare2@hotmail.com</h6>
</body>
</html>