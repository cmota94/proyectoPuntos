@extends('layout')


@section('title', '- usuarios')

@section('contenido')
	
	<div class="col-md-10 col-md-offset-1">
		<h3 class="page-header"><span class="fa fa-upload "></span> Subir puntos para la actividad: <small>{{  $evento->actividad }}</small></h3>
	</div>
	
	
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
		  	<div class="panel-body"><br>
		  		<div class="col-md-5">
		  			<ul>
		  				<li><strong><span class="fa fa-genderless"></span> Fecha del evento: </strong>{{ $evento->act_fechainicio }}</li>
		  				<li><strong><span class="fa fa-genderless"></span> Hora del evento: </strong>{{ $evento->act_horainicio }}</li>
		  				<li><strong><span class="fa fa-genderless"></span> Responsable del evento: </strong>{{ $evento->act_responsable }}</li>
		  			</ul>
		  		</div>
				
				<div class="col-md-7">
		  			<form class="form-responsive" action=" {{ url('/eventos/subir/') }}" method="post">
						@if ($errors->all())
							<div class="alert alert-warning alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <h3><span class="fa-exclamation-triangle fa"></span> ¡Errores!</h3>
							  <ul>
							  	@foreach ($errors->all() as $error)
					              <li class="alert alert-danger">{{$error}}</li>
					          	@endforeach
							  </ul>
							</div>
						@endif

				        @if (session('status'))
				          <div class="alert alert-success">
				            {{session('status')}}
				          </div>
				        @endif

				        <input type="hidden" name="_token" value="{!! csrf_token() !!}"> 
				        <!-- Codigo que nos permite enviar los datos, ya que envia un token -->

						<label><span class="fa fa-genderless"></span> Números de cuenta: </label>
						<textarea placeholder="Introduce los numeros de cuenta..." class="form-control" rows="5" name="numeros" id="numeros"></textarea><br>
						<input type="hidden" name="insidgrupo" value="{{ $evento->gruidgrupo }}">
						<div class="text-center">
							<button class="btn btn-primary" type="submit" data-toggle="modal" data-target="#modalbuscar"><span class="fa fa-check-circle-o "></span> Registrar</button>
						</div>
					</form>
		  		</div>
		  	</div><br>
		</div>
		Al final de cada paquete de números de cuenta registrar el número de cuenta para el corte**
	</div>

	<div class="modal fade" id="modalbuscar" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="fa-search fa "></span> Registrar eventos</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
	        	<form action=" {{ url('/eventos/subir/'. $evento->act_idactividad) }}" method="post">

	        		<input type="hidden" name="_token" value="{!! csrf_token() !!}">
	        		<div class="row" id="detalles">
	        			
				        <div class="form-group col-md-4 text-center col-md-offset-1" id="opciones">
				          	<label for="nombre">1. Registrar numeros de cuenta para actividad:</label>
				        </div>
				        <div class="form-group col-md-6 text-center">
				          	<select class="form-control">
				          		<option value="1">Carrera nocturna</option>
				          		<option value="2">Conferencia sobre administración</option>
				          		<option value="3">Taller de redacción</option>
				          		<option value="4">Conferencia metodologías ágiles</option>
				          	</select>
				        </div>
			          	
		          	</div>
		          	<!--<div class="row">
		          		<div class="form-group col-md-4 text-center col-md-offset-1">
				          	<label for="nombre">2. Registrar numeros de cuenta para actividad:</label>
				        </div>
				        <div class="form-group col-md-6 text-center">
				          	<select class="form-control" id="pidMaterial">
				          		<option value="1">Carrera nocturna</option>
				          		<option value="2">Conferencia sobre administración</option>
				          		<option value="3">Taller de redacción</option>
				          		<option value="4">Conferencia metodologías ágiles</option>
				          	</select>
				        </div>
		          	</div>
		          	<div class="row">
		          		<div class="form-group col-md-4 text-center col-md-offset-1">
				          	<label for="nombre">3. Registrar numeros de cuenta para actividad:</label>
				        </div>
				        <div class="form-group col-md-6 text-center">
				          	<select class="form-control">
				          		<option value="1">Carrera nocturna</option>
				          		<option value="2">Conferencia sobre administración</option>
				          		<option value="3">Taller de redacción</option>
				          		<option value="4">Conferencia metodologías ágiles</option>
				          	</select>
				        </div>
		          	</div>-->
		          	<div class="row">
		          		<div class="col-md-12">
		          			<div class="text-center">
		          				<button type="submit" class="btn btn-info" >Registrar <span class="fa fa-search"></span></button>
			        			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
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
<script type="text/javascript">

	/*$(document).ready(function(){
      $("#modalbuscar").modal("show");
   	});*/
	
	$(document).ready(function(){

		var Numeros = document.getElementById('numeros').value;
		//alert(Numeros);

	});

	function agregar(){

		Numeros = document.getElementById('numeros').value;

		var idMaterail=Numeros[0];
		var actividad = $('#pidActividad option:selected').text();

		var fila = '<div class="form-group col-md-4 text-center col-md-offset-1" id="opciones"><label for="nombre">1. Registrar numeros de cuenta para actividad:</label></div><div class="form-group col-md-6 text-center"><select class="form-control"><option value="1">Carrera nocturna</option><option value="2">Conferencia sobre administración</option><option value="3">Taller de redacción</option><option value="4">Conferencia metodologías ágiles</option></select></div>';
		
		//var fila = '<select class="form-control"><option value="1" id="opcion'+cont+'">'+actividad+'</option></select>';
		$("#detalles").append(fila);
	}

	

</script>
	{{-- expr --}}
@endsection