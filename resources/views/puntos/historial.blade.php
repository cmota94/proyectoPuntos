@extends('layout')

@section('title', '- historial')

@section('contenido')


	@if (session('status'))
		<div class="alert alert-success"> 
			{{session('status')}}
		</div>
	@endif

		<!-- Principio del buscador -->
		<div class="row">
			<div class="col-sm-4 col-md-8 col-md-offset-1">
				<h2 class="page-header"><span class="fa fa-list-alt "></span> Historial actividades alumno: [Nombre] </h2>
			</div><br><br>
			<!--<div class="col-md-1 col-md-offset-1">
				<button type="button" data-toggle="modal" data-target="#modalbuscar" class="btn btn-primary">Buscar <span class="fa fa-search"></span></button>
			<!--<form action=" {{ url('/usuarios') }}" class="form-inline pull-right" method="GET" id="search">
				<div class="input-group">
      				<input type="text" class="form-control" placeholder="Buscar..." name="searchText" aria-describedby="search">
      				<span class="input-group-btn">
        				<button class="btn btn-outline-primary" type="button"><span class="fa fa-search " id="search"></span></button>
     				</span>
    			</div><!-- /input-group --
			</form>-->
			</div>
		</div><br>
		

		<!-- Fin del buscador -->

		<!-- TABLA DE CONTENIDO -->
		<div class="col-md-10 col-md-offset-1">
			<div class="table-responsive rounded panel panel-default">
			<table class=" display table table-hover text-center border" id="tabla"> <!-- -->
				<thead class="thead-light active"> 
					<tr class="active">
						<th class="text-center">Actividad</th>
						<th class="text-center">Fecha de inicio del evento</th>
						<th class="text-center">Hora de inicio</th>
						<th class="text-center">Lugar del evento</th>
						<th class="text-center">Tipo de puntos</th>
						<th class="text-center">Estatus</th>
						<th class="text-center">Puntos otorgados</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Carrera nocturna</td>
						<td>14/Diciembre/2018</td>
						<td>18:00</td>
						<td>Externo FCA</td>
						<td>Deportivos</td>
						<td>Insctito</td>
						<td></td>
					</tr>
					<tr>
						<td>Conferencia administración</td>
						<td>29/Agosto/2017</td>
						<td>14:00</td>
						<td>Auditorio Maestro Carlos Pérez del Toro</td>
						<td>Culturales</td>
						<td>Registrado</td>
						<td>2</td>
					</tr>
					<tr>
						<td>Taller de redacción</td>
						<td>12/Agosto/2019</td>
						<td>15:00</td>
						<td>Aulas del edificio J</td>
						<td>Culturales</td>
						<td>Registrado</td>
						<td>5</td>
					</tr>
					<tr>
						<td><strong>TOTAL</strong></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><strong>7</strong></td>
					</tr>
					
				</tbody>
			</table>
		</div>
		<div class="text-center">
			<!--<button class="btn btn-primary"><span class="fa fa-files-o"></span> Descargar</button>-->
			<button class="btn btn-default"><span class="fa fa-chevron-circle-left "></span> Descargar</button>
		</div><br><br><br>
		<div class="row">
			<div class="col-md4">
				<strong>Estatus</strong><br>	
				Inscrito: Se inscribió pero no asistió.
				<p>Registrado: Asistió al evento.</p>
			</div>	
		</div>
		
		</div>		<br>

		

<!-- Modal buscar --> 
  <div class="modal fade" id="modalbuscar" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="background-color: #fafafa;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="fa-search fa "></span> Buscar constancias</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
	        	<form action=" {{ url('/eventos/cargar') }}" method="post">
	        		<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	        		<div class="row text-center">
	        			<div class="col-md-12">
	        				<span class="fa fa-dot-circle-o"></span> Buscar por numero de cuenta del alumno:
	        			</div><br>
	        			<div class="form-group col-md-6 col-md-offset-3">
			          		<label for="numeroCuenta">Número de cuenta:</label>
			          		<input input[type=number] { -moz-appearance:textfield; } name="numeroCuenta" class="form-control">
			          	</div>
	        		</div>
					<div class="col-md-10 col-md-offset-1">
						<hr>
					</div>
	        		<div class="row text-center">
	        			<div class="col-md-12">
	        				<span class="fa fa-dot-circle-o "></span> Buscar por periodo:
	        			</div><br>
	        			<div class="form-group col-md-3 text-center col-md-offset-3">
			          		<label for="nombre">Fecha de inicio:</label>
			          		<input type="date" name="fechaInicio" class="form-control">
			          	</div>
			          	<div class="form-group col-md-3">
			          		<label>Fecha de fin:</label>
							<input type="date" name="fechaFin" class="form-control">
			          	</div>
	        		</div><br>	
		          	<div class="row text-center">
		          		<div class="col-md-6 col-md-offset-3">
		          			<div class="text-center">
			        			<button type="submit" class="btn btn-info">Buscar <span class="fa fa-search"></span></button>
			        			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar <span class="fa fa-ban"></span></button>
		        			</div>
		          		</div>
		          	</div>
		          	
	          	</form>
        	</div>
        </div>
      </div>
      
    </div>
  </div>

@endsection

@section('js')

<script>
	
	$(document).ready(function(){
	    $('[data-toggle="popover"]').popover();   
	});
	
</script>


@endsection