@extends('layout')

@section('title', '- evento consultar')


@section('contenido')
	
	<div class="col-md-10 col-md-offset-1">
		<h2 class="page-header"><span class="fa fa-calendar"></span> Consultar evento </h2><br>
	</div>

    <br>
    <div class="col-md-10 col-md-offset-1">
    	<form class="form" action="{{ url('eventos/registrar') }}" method="post">

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


          	<div class="form-group col-md-6">
          		<label>Nombre de la actividad:</label>
          		<input type="text" name="act_nombre" disabled="" class="form-control" value="{{ $evento[0]->act_nombre }}">
          	</div>
          	<div class="form-group col-md-4">
          		<label>Responsable(s):</label>
          		<input type="text" name="act_responsable" class="form-control" value="{{ $evento[0]->act_responsable }}" disabled="">
          	</div>
          	<div class="form-group col-md-2">
          		<label>Tipo de actividad:</label>
          		<select class="form-control" name="act_tipo" disabled="">
          			<option value="FCA">FCA</option>
          			<option value="UNAM">UNAM</option>
          			<option value="Externa">Externa</option>
          		</select>
          	</div>
          	<div class="form-group col-md-2">
          		<label>Subcategoría:</label>
          		<select class="form-control" name="sub_idSubcategoria" disabled="">
      					@foreach ($subcategorias as $subcategoria)
      						<option value="{{ $subcategoria->sub_idSubcategoria }}">{{ $subcategoria->sub_nombre }}</option>
      					@endforeach
          		</select>
          	</div>
			
          	<div class="form-group col-md-3">
          		<label>Fecha inicio del evento:</label>
          		<input type="date" name="act_fechaInicio" class="form-control" value="{{ $evento[0]->act_fechaInicio }}" disabled="">
          	</div>
          	<div class="form-group col-md-2">
          		<label>Fecha fin del evento:</label>
          		<input type="date" name="act_fechaFin" class="form-control" value="{{ $evento[0]->act_fechaFin }}" disabled="">
          	</div>
          	<div class="form-group col-md-3">
          		<label>Hora inicio del evento:</label>
          		<input type="time" name="act_horaInicio" class="form-control" value="{{ $evento[0]->act_horaInicio }}" disabled="">
          	</div>
          	<div class="form-group col-md-2">
          		<label>Hora fin del evento:</label>
          		<input type="time" name="act_horaFin" class="form-control" value="{{ $evento[0]->act_horaFin }}" disabled="">
          	</div>
          	<div class="form-group col-md-4">
          		<label>Lugar del evento:</label>
          		<select class="form-control" name="rec_idRecinto" disabled="">
      					@foreach ($recintos as $recinto)
      						<option value="{{ $recinto->rec_nombre }}">{{ $recinto->rec_nombre }}</option>
      					@endforeach
          		</select>
          	</div>
          	<div class="form-group col-md-2">
          		<label>Puntos otorgados:</label>
          		<input input[type=number] { -moz-appearance:textfield; } name="act_numeroPuntos" class="form-control" value="{{ $evento[0]->act_numeroPuntos }}" disabled="">
          	</div>
          		<div class="form-group col-md-2">
          		<label>Estatus:</label>
          		<select class="form-control" name="act_estatus" disabled="">
          			<option value="Por realizar">{{ $evento[0]->act_estatus }}</option>
          		</select>
          	</div>
          	<div class="form-group col-md-4">
          		<label>Descripción:</label>
          		<textarea name="act_descripcion" class="form-control" rows="1" disabled="">{{ $evento[0]->act_descripcion }}</textarea>
          	</div>
				<input type="hidden" name="ar_idArea" value="{{ Auth::user()->ar_idArea }}">
          	<br>
			
			<div class="col-md-12">
				<div class="text-center"> 
            <!--<button type="submit" class="btn btn-primary">
    		 			<span class="fa fa-floppy-o"></span> Registrar
    		 		</button>-->
	          		<a href="{{ url('/eventos') }}" class="btn btn-default">
	          			<span class="fa  fa-arrow-circle-o-left "></span> Regresar
	          		</a>
	          	</div><br>
			</div><br>
		          	
	    </form>
    </div>  
	
      
          
 @endsection