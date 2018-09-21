@extends('layout')

@section('title')

@section('contenido')

<div class="col-md-10 col-md-offset-1">
	<br><h3><span class="fa fa-file-text-o "></span> Reporte del evento: <small>{!! $evento[0]->act_nombre !!}</small></h3><br>
</div>

<div class="col-md-10 col-md-offset-1">
	<div class="table-responsive rounded panel panel-default">
		<table class=" display table table-hover text-center border" id="tabla"> <!-- -->
			<thead class="thead-light active">
				<tr class="active">
					<th class="text-center">Nombre del alumno</th>
					<th class="text-center">Número de cuenta:</th>
					<th class="text-center">Carrera</th>
					<th class="text-center">Sistema</th>
					<th class="text-center">Puntos otorgados</th>
				</tr>
			</thead>
			<tbody>
				@for ($j = 0; $j < count($alumnosR); $j++)
					@for ($i = 0; $i < 5; $i++)
						<tr>
							<th class="text-center">{{ $alumnosR[$j][$i] }}</th>
							<td class="text-center">{!! $evento[0]->insIdAlumno  !!}</td>
							<td class="text-center">{{ $alumnosR[$j][$i] }} </td>
							<td class="text-center">{{ $alumnosR[$j][$i] }} </td>
							<td class="text-center">{!! $evento[0]->act_numeroPuntos !!}</td>
						</tr>	
					@endfor
				@endfor
			</tbody>
		</table>
	</div>
	<div class="text-center">
		<a href="{!! action('EventosController@generarReporte', $evento[0]->act_idActividad) !!}" class="btn btn-primary"><span class="fa fa-download"></span> Descargar</a>
		<a href="{{ url('/eventos') }}" class="btn btn-default"><span class="fa fa-ban"></span> Salir</a>
	</div>
</div>		

@endsection

@section('js')

	<script>
		
		
	



	</script>


@endsection