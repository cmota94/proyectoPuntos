@extends('layout')


@section('title', '- usuarios')

@section('contenido')
	
	<div class="col-md-10 col-md-offset-1">
		<h3 class="page-header"><span class="fa fa-upload "></span> Subir puntos para las diferentes actividades</small></h3>
	</div>
	
	
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
		  	<div class="panel-body"><br>
		  		
				<div class="col-md-8 col-md-offset-2">
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
		        		@for ($i = 0; $i < $contador2 ; $i++)
		        			<div class="row" id="detalles">
					        <div class="form-group col-md-8 text-center" id="opciones">
					          	<label for="nombre">{{ $i . "." }} Registrar numeros de cuenta para actividad:</label>
					        </div>
					        <div class="form-group col-md-4 text-center">
					          	<select class="form-control">
					          		@foreach ($eventos as $item)
										<option value="{{ $item->act_idactividad }}">{{ $item->act_nombre }}</option>
					          		@endforeach
					          	</select>
					        </div>
			          	</div><br>
		        		@endfor
		        		
			          	
			          	<div class="row">
			          		<div class="col-md-12">
			          			<div class="text-center">
			          				<button type="submit" class="btn btn-info" >Registrar <span class="fa fa-save"></span></button>
			          				<a href="{{ url('/eventos') }}" class="btn btn-default">Cancelar</a>
			        			</div>
			          		</div>
			          	</div>
			          	
		          	</form>
		  		</div>
		  	</div><br>
		</div>
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