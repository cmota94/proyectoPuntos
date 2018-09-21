<!DOCTYPE html>
<html class="fondo">
<head>
	<title>Constancia - Alumno tal</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}">
</head>
<body class="contenido-principal">
	
	<div>
		<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Escudo-UNAM-escalable.svg/1200px-Escudo-UNAM-escalable.svg.png" class="imagen" width="70px">

		<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d8/Logofca.jpg/240px-Logofca.jpg" class="imagen-left" width="70px">

		<br>
		<h4 align="center">
			Universidad Nacional Autónoma de México <br>
			Facultad de Contaduría y Administración <br>
			Secretaría de relaciones y extensión universitaria <br>
		</h4><br>
	</div>
	<p>otorga la presente</p>

	<img src="{{ asset('constancia.jpg') }} " width="500px"><br>

	<strong>a</strong><br>
	<h3>{{ $alumno[1] . " " . $alumno[2] . " " . $alumno[3] }}</h3><br>
	<p>
		Con número de cuenta: <strong>{{ $alumno[0] }}</strong>
	</p>
	<p>
		Por haber cumplido el requisito de participacion de actividades culturales, deportivas y de apoyo a la comunidad, como lo establece el Plan de estudios 2012, aprobado por el H. Consejo Técnico en la sesión número 383, celebrada eñ 16 de febrero de 2011.
	</p><br>
	<p>
		<strong>"POR MI RAZA HABLARÁ EL ESPÍRITU"</strong><br>
		México D.F.a 12 de febrero de 2018.
	</p><br><br>

	<p>
		<strong>Mtro. Tomás Humberto Rubio Pérez</strong><br>
		Director de la facultad
	</p><br>

	<p>
		<strong>L.A. Alberto García Pantoja</strong><br>
		Secretario de relaciones y extensión universitaria
	</p>

</body>
</html>