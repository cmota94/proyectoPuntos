<!DOCTYPE html>
<html>
<head>
	<title>Reporte: {{ $evento[0]->act_nombre }}</title>
</head>
<body>
	<title>Carta expres - Alumno tal</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}">
</head>
<body class="contenido-principal">
	
	<div>
		<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Escudo-UNAM-escalable.svg/1200px-Escudo-UNAM-escalable.svg.png" class="imagen" width="80px">

		<br><h4 align="right">FACULTAD DE CONTADRÍA Y ADMINISTRACION <br>
			SECRETARÍA DE DIFUSIÓN CULTURAL <br>
		</h4><br><br>
	</div><br><br>
	<div>
		<h3>Reporte de asistentes al evento: {!! $evento[0]->act_nombre !!}</h3>
	</div>
	<div class="table-responsive rounded panel panel-default">
			<table class=" display table table-hover text-center border" id="tabla"> <!-- -->
				<thead class="thead-light active">
					<tr>
						<th class="text-center">Nombre del alumno</th>
						<th class="text-center">Número de cuenta:</th>
						<th class="text-center">Carrera</th>
						<th class="text-center">Sistema</th>
						<th class="text-center">Puntos otorgados culturales</th>
						<th class="text-center">Puntos otorgados deportivos</th>
						<th class="text-center">Puntos otorgados responsabilidad social</th>
					</tr>
				</thead>
				<tbody>
						@while ($row = pg_fetch_row($alumnos))
							<tr>
								<th class="text-center">{!! $row[0]  !!}</th>
								<td class="text-center">{!! $row[1]  !!}</td>
								<td class="text-center">{!! $row[2]  !!}</td>
								<td class="text-center">{!! $row[3]  !!}</td>
								<td class="text-center">{!! $row[2]  !!}</td>
								<td class="text-center">{!! $row[2]  !!} </td>
								<td class="text-center">{!! $row[2]  !!}</td>
							</tr>
						@endwhile
				</tbody>
			</table>
		</div>
</body>
</html>