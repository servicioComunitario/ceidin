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
		table{
			border-collapse: collapse;
			border: 1px solid black;
			margin:auto;
		}
		td{
			border: 1px solid black;
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
	<h2>ASIGNACION DE CEDULA ESCOLAR</h2>
	<p>
		La Direccion del CENTRO DE EDUCACION INICIAL "DESARROLLO INTEGRAL DEL NIÑO" hace constar que al estudiante {{$alumno->datosBasico->nombre}} {{$alumno->datosBasico->apellido}} nacido en {{$alumno->lugar_nacimiento}} en fecha {{$alumno->datosBasico->fecha_nacimiento}} se le asigna el <strong>Numero de Cédula Escolar</strong> {{$alumno->datosBasico->cedula}}
	</p>
	<p>
		Este número lo conservara el estudiante para la emisión de los Documentos Probatorios del Estudio que se puedan emitir
	</p>

	<table>
		<tr>
			<td>
				<strong>Director(a)</strong>
			</td>
			<td rowspan="7">
				<strong>SELLO DEL PLANTEL</strong>
			</td>
		</tr>
		<tr>
			<td>Apellidos y Nombres</td>
		</tr>
		<tr>
			<td>{{$director->datosBasico->nombre}} {{$director->datosBasico->apellido}}</td>
		</tr>
		<tr>
			<td>Numero de C.I</td>
		</tr>
		<tr>
			<td>{{$director->datosBasico->cedula}}</td>
		</tr>
		<tr>
			<td>Firma</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
	</table>

</body>
</html>