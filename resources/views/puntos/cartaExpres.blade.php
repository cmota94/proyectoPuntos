<!DOCTYPE html>
<html>
<head>
	<title>Carta expres - Alumno tal</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}">
</head>
<body class="contenido-principal">
	
	<div>
		<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Escudo-UNAM-escalable.svg/1200px-Escudo-UNAM-escalable.svg.png" class="imagen" width="100px">

		<br><h4 align="right">FACULTAD DE CONTADRÍA Y ADMINISTRACION <br>
			SECRETARÍA DE DIFUSIÓN CULTURAL <br>
			Folio: ##
		</h4><br><br>
	</div>
	<p align="right"><strong>Asunto: </strong>Puntos culturales</p>

	<div class="contenido-sec">
		<strong>A QUIEN CORRESPONDA</strong>
		<h4>Presente</h4>
		<p align="justify">Por este medio, me permito hacer de su conocimiento que {{ $alumno[1]. " " . $alumno[2]. " " . $alumno[3] }}, con número de cuenta {{ $alumno[0] }} tiene actualmente un total de 15 puntos culturales registrados por parte de la Facultad de Contaduría y Administración de la UNAM</p>
		<p align="justify">Se expide la presente petición de la persona referida y sirva para los fines que juzgue convenientes.</p>
		<p>Sin otro particular, quedo de usted.</p>
	</div><br>

	<div class="contenido-sec">
		<strong>
			Atentamente <br>
			"Por mi raza hablará el espíritu" <br>
			Ciudad universitaria, Cd. Mx. {{ $fecha->format('d-m-Y') }} <br>
			El secretario <br><br><br><br><br>

			LIC. ERNESTO DURAND RODRÍGUEZ	
		</strong>
	</div>
	



</body>
</html>