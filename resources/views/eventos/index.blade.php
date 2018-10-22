@extends('layout')

@section('title', '- eventos')

@section('contenido')


	@if (session('status'))
		<div class="alert alert-success"> 
			{{session('status')}}
		</div>
	@endif

		<!-- Principio del buscador -->
		<div class="row">
			<div class="col-sm-1 col-md-8 col-md-offset-1">
				<h2 class="page-header"><span class="fa fa-calendar"></span> Eventos 
					<a href="{{ url('eventos/registrar') }}" class="btn btn-primary">Registrar <span class="fa fa-plus"></span></a>
				</h2>
			</div><br><br>
			<div class="col-md-1 col-sm-1">
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
		<div class="col-md-12">
			<div class="table-responsive rounded panel panel-default">
			<table class=" display table table-hover text-center border" id="tabla"> <!-- -->
				<thead class="thead-light">
					<tr class="active">
						<th class="text-center">Subcategoría</th>
						<th class="text-center">Nombre actividad</th>
						<th class="text-center">Fecha evento</th>
						<th class="text-center">Horario de inicio</th>
						<th class="text-center">Lugar del evento</th>
						<th class="text-center">Estatus</th>
						<th colspan="4" class="text-center">Opciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($eventos as $evento)
						<tr>
							<td>{!! $evento->sub_nombre !!}</td>
							<td>
								<a href="*" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="Presiona para ver los detalles del usuario">{!! $evento->act_nombre !!}</a>
							</td>
							<td>{!! $evento->act_fechainicio !!}</td>
							<td>{!! $evento->act_horainicio !!}</td>
							<td>{!! $evento->rec_nombre !!}</td>
							@if ($evento->act_estatus == 'Por realizar')
								<td><button class="btn btn-info active">{!! $evento->act_estatus !!}</button></td>
							@else
								<td><button class="btn btn-danger active">{!! $evento->act_estatus !!}</button></td>							
							@endif
							
							<td colspan="4">

								<form action="{{ url('/eventos/estatus/'.$evento->act_idactividad)}}" method="post">
									<input type="hidden" name="_token" value="{!! csrf_token() !!}">
									@if (Auth::user()->usu_idrol != 12)
									 	<button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Cambiar estatus"><span class="fa fa-refresh"></span></button>
									 
				      				

					      				@if ($fechaActual->format('Y-m-d') <= $evento->act_fechainicio)

											<a class="btn btn-default" href="{!! action('EventosController@edit', $evento->act_idactividad) !!}" data-toggle="tooltip" data-placement="top" title="Editar"><span class="fa fa-pencil-square-o"></span></a>

										@elseif($fechaActual->format('Y-m-d') >= $evento->act_fechainicio)

											<a class="btn btn-default" href="{!! action('EventosController@show', $evento->act_idactividad) !!}" data-toggle="tooltip" data-placement="top" title="Consultar"><span class="fa fa-pencil-square-o"></span></a>

										@endif
								   

									   <a href="{!! action('EventosController@mostrarDetallesEvento', $evento->act_idactividad) !!}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Generar reporte"><span class="fa fa-file-text-o "></span></a>

									   <a href="{{ url('/inscripciones/registrar/'.$evento->act_idactividad) }}" class="btn btn-default"><span class="fa fa-pencil " data-toggle="tooltip" data-placement="top" title="Inscribir"></span></a>
									
								   @endif
								   
								   <a href="{!! action('EventosController@subirPuntos', $evento->act_idactividad) !!}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Subir puntos"><span class="fa fa-upload "></span></a>

								   
					      			</form>

					      			

							   <!--<a href="{!! action('EventosController@cambiarEstatus', $evento->act_idactividad) !!}" class="btn btn-default" data-toggle="popover" data-trigger="hover" data-placement="top" data-content="Metros."><span class="fa-refresh fa"></span></a>-->

								
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="text-center">
			{{ $eventos->render() }}
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
			          			@foreach ($categorias as $categoria)
			          				<option value="{{ $categoria->sub_idsubcategoria }}">{{ $categoria->sub_nombre }}</option>
			          			@endforeach
			          		</select>
			          	</div>-->
			        <div class="form-group col-md-4 text-center col-md-offset-2">
			          		<label for="nombre">Nombre de la actividad:</label>
			          		<input type="search" name="actividad" class="form-control">
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
		          			@foreach ($recintos as $recinto)
								<option value="{{ $recinto->rec_idrecinto }}">{{ $recinto->rec_nombre }}</option>		          			
							@endforeach
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