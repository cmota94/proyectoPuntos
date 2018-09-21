@extends('layout')


@section('title', '- usuarios')

@section('contenido')
	
	<div class="col-md-10 col-md-offset-1">
		<h3 class="page-header"><span class="fa fa-upload "></span> Registrar inscripción <small>{{  $evento[0]->actividad }}</small></h3>
	</div>
	
	
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
		  	<div class="panel-body"><br>
		  		<!--<div class="col-md-5">
		  			<ul>
		  				<li><strong><span class="fa fa-genderless"></span> Fecha del evento: </strong>{{ $evento[0]->act_fechaInicio }}</li>
		  				<li><strong><span class="fa fa-genderless"></span> Hora del evento: </strong>{{ $evento[0]->act_horaInicio }}</li>
		  				<li><strong><span class="fa fa-genderless"></span> Responsable del evento: </strong>{{ $evento[0]->act_responsable }}</li>
		  			</ul>
		  		</div>-->
				
				<div class="col-md-7">
		  			<form class="form-responsive">
						<label><span class="fa fa-genderless"></span> Número de cuenta: </label>
						<textarea placeholder="Introduce los numeros de cuenta..." class="form-control" rows="2"></textarea><br>
						<div class="text-center">
							<button class="btn btn-primary" type="submit"><span class="fa fa-check-circle-o "></span> Registrar</button>
						</div>
					</form>
		  		</div>
		  	</div><br>
		</div>
	</div>

@endsection