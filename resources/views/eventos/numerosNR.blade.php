<!DOCTYPE html>
<html>
<head>
	<title>Números de cuenta que no fueron registrados</title>
</head>
<body>
	<h4>Estos números de cuenta no se encuentran en la base de datos, por lo que no se pudieron registrar</h4>

	<ul>
		@foreach ($resultados2 as $element)
			<li>{{ $element }}</li>
		@endforeach
	</ul>
</body>
</html>