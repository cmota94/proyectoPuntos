@extends('layout')

@section('title', '- inscripciones')

@section('contenido')


	@if (session('status'))
		<div class="alert alert-success"> 
			{{session('status')}}
		</div>
	@endif

		<!-- Principio del buscador -->
		<div class="row">
			<div class="col-sm-1 col-md-7 col-md-offset-1">
				<h2 class="page-header"><span class="fa fa-list-alt "></span> Inscripciones 
					<!--<a href="{{ url('eventos/registrar') }}" class="btn btn-primary">Registrar <span class="fa fa-plus"></span></a>-->
				</h2>
			</div><br><br>
			<!--<div class="col-md-1 col-sm-1">
				<button type="button" data-toggle="modal" data-target="#modalbuscar" class="btn btn-primary">Buscar <span class="fa fa-search"></span></button>-->
			<div class="col-md-3">
			<form action=" {{ url('/usuarios') }}" class="form-inline pull-right" method="GET" id="search">
				<div class="input-group">
      				<input type="text" class="form-control" placeholder="Buscar..." name="searchText" aria-describedby="search">
      				<span class="input-group-btn">
        				<button class="btn btn-primary" type="submit"><span class="fa fa-search " id="search"></span></button>
     				</span>
    			</div><!-- /input-group -->
			</form>
			</div>
		</div><br>
		

		<!-- Fin del buscador -->

		<!-- TABLA DE CONTENIDO -->
		<div class="col-md-10 col-md-offset-1">
			<div class="table-responsive rounded panel panel-default">
			<table class=" display table table-hover text-center border" id="tabla"> <!-- -->
				<thead class="thead-light">
					<tr class="active">
						<th class="text-center">Nombre actividad</th>
						<th class="text-center">Fecha evento</th>
						<th class="text-center">Horario de inicio</th>
						<th class="text-center">Lugar del evento</th>
						<th colspan="4" class="text-center">Opciones</th>
					</tr>
				</thead>
				<tbody>
					<td>Conferencia sobre administración</td>
					<td>2018-09-12</td>
					<td>14:00:00</td>
					<td>Auditorio Mtro. Carlos Pérez del Toro</td>
					<td><button class="btn btn-default"><span class="fa fa-check "></span></button></td>
				</tbody>
			</table>
		</div>
		<div class="text-center">
			
		</div>
	</div>		

<!-- Modal cambiar estatus --> 
  <div class="modal fade" id="modalbuscar" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="fa-search fa "></span> Buscar evento</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
	        	<form action=" {{ url('/eventos') }}" method="post">

	        		<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	        		<div class="row">
	        			<!--<div class="form-group col-md-3 col-md-offset-1">
			          		<label for="nombre">Subcategoría:</label>
			          		<select class="form-control" name="subcategoria">
			          			
			          		</select>
			          	</div>-->
			        <div class="form-group col-md-4 text-center col-md-offset-2">
			          		<label for="nombre">Nombre de la actividad:</label>
			          		<input type="text" name="actividad" class="form-control">
			        </div>
			          	<!--<div class="form-group col-md-3">
			          		<label>Fecha de inicio:</label>
							<input type="date" name="fechaInicio" class="form-control">
			          	</div>
	        		</div> 
		          	
		          	--<div class="form-group col-md-4 col-md-offset-2">
		          		<label for="nombre">Hora de inicio:</label>
		          		<input type="time" name="horaInicio" class="form-control">
		          	</div>-->
		          	<div class="form-group col-md-4">
		          		<label for="nombre">Lugar del evento:</label>
		          		<select class="form-control" name="lugar">
		          			<option value=""></option>
		          			
		          		</select><br>
		          	</div><br>
		          	<div class="row">
		          		<div class="col-md-12">
		          			<div class="text-center">
			        			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
			        			<button type="submit" class="btn btn-info">Buscar <span class="fa fa-search"></span></button>
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
	    $('[data-toggle="tooltip"]').tooltip();   
	});
	
	$(document).ready(function(){
	    $('[data-toggle="popover"]').popover();   
	});

</script>


@endsection