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
				<h2 class="page-header"><span class="fa fa-list-alt "></span> Historial alumnos </h2>
			</div><br><br>
			<div class="col-md-1 col-md-offset-1">
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
						<th class="text-center">Número de cuenta</th>
						<th class="text-center">Nombre(s)</th>
						<th class="text-center">Apellido paterno</th>
						<th class="text-center">Apellido materno</th>
						<th colspan="4" class="text-center">Opciones</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>414363831</td>
						<td>Ma. Guadalupe</td>
						<td>Damián</td>
						<td>Contreras</td>
						<td>
							<button data-toggle="tooltip" data-placement="top" title="Descargar" class="btn btn-small btn-default"><span class="fa fa-floppy-o "></span></button>
						</td>
					</tr>
					<tr>
						<td>313304901</td>
						<td>César Jair</td>
						<td>Mota</td>
						<td>Sánchez</td>
						<td>
							<a href="{{ url('/eventos/historialIndex/historial') }}" class="btn btn-small btn-default" data-toggle="tooltip" data-placement="top" title="Descargar"><span class="fa fa-floppy-o "></span></a>
						</td>
					</tr>
					<tr>
						<td>325678931</td>
						<td>Francisco</td>
						<td>Pérez</td>
						<td>Martínez</td>
						<td>
							<button class="btn btn-small btn-default" data-toggle="tooltip" data-placement="top" title="Descargar"><span class="fa fa-floppy-o "></span></button>
						</td>
					</tr>
					
				</tbody>
			</table>
		</div>
		<div class="text-center">
			<!--<button class="btn btn-primary"><span class="fa fa-files-o"></span> Descargar</button>-->
			<button class="btn btn-default"><span class="fa fa-chevron-circle-left "></span> Regresar</button>
		</div>
		</div>		

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