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
		h5{
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
			width: 100%;
			border-collapse: collapse;
			border: 1px solid black;
			margin:auto;
		}
		td{
			border: 1px solid black;
		}
		th{
			border: 1px solid black;
			text-align: center;
		}
	</style>
</head>
<body>
	<h5>Docente:{{$docente_periodo->docente->datosBasico->nombre}} {{$docente_periodo->docente->datosBasico->apellido}} Nivel:{{$docente_periodo->nivel}} Seccion:{{$docente_periodo->seccion}} Año Escolar:{{$docente_periodo->periodo->nombre}}</h5>
	<table>
		<thead>
			<tr>
				<th colspan="7"><h1>INSCRIPCIÓN INICIAL</h1></th>
			</tr>
			<tr>
				<th colspan="7"><h6>DATOS DEL NIÑO</h6></th>
			</tr>
			<tr>
				<th>N°</th>
				<th>Apellidos y Nombres</th>
				<th>Sexo</th>
				<th>Fecha de Nac</th>
				<th>Edad</th>
				<th>Lugar de Nac</th>
				<th>Nacionalidad</th>
			</tr>
		</thead>
		<tbody>
			@foreach($inscripciones as $key => $inscripcion)
				<tr>
					<td>{{$key+1}}</td>
					<td>{{$inscripcion->alumno->datosBasico->nombre}} {{$inscripcion->alumno->datosBasico->apellido}}</td>
					<td>{{$inscripcion->alumno->datosBasico->sexo}}</td>
					<td>{{$inscripcion->alumno->datosBasico->fecha_nacimiento}}</td>
					<td>{{$inscripcion->alumno->edadAlumno($inscripcion->alumno->datosBasico->fecha_nacimiento)}}</td>
					<td>{{$inscripcion->alumno->lugar_nacimiento}}</td>
					<td>{{$inscripcion->alumno->nacionalidad}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<h5>
		Inscripción inicial: Hembras = {{$hembras}} Varones:{{$varones}} Total:{{$total}}
	</h5>
</body>
</html>