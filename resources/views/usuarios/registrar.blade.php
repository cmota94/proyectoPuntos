@extends('layout')

@section('title', '- usuarios registrar')


@section('contenido')
	
	<div class="col-md-6 col-md-offset-1">
		<h2 class="page-header"><span class="fa fa-user-o"></span> Registrar usuario </h2><br>
	</div>

    <div class="col-md-10 col-md-offset-1">
    	
	<form class="form" action="{{ url('usuarios/registrar') }}" method="post">

	@if ($errors->all())
		<div class="alert alert-warning alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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


		          	<div class="form-group col-md-4">
		          		<label>Nombre:</label>
		          		<input type="text" name="usu_nombre" class="form-control">
		          	</div>
		          	<div class="form-group col-md-4">
		          		<label>Apellido paterno:</label>
		          		<input type="text" name="usu_apellidopaterno" class="form-control">
		          	</div>
		          	<div class="form-group col-md-4">
		          		<label>Apellido materno:</label>
		          		<input type="text" name="usu_apellidomaterno" class="form-control">
		          	</div>
		          	<div class="form-group col-md-3">
		          		<label>Correo electrónico:</label>
		          		<input type="text" name="email" class="form-control">
		          	</div>
		          	<div class="form-group col-md-3">
		          		<label>Contraseña:</label>
		          		<input type="password" name="password" class="form-control">
		          	</div>
		          	<div class="form-group col-md-3">
		          		<label>Confirmación de contraseña:</label>
		          		<input type="password" name="password" class="form-control">
		          	</div>
		          	<div class="form-group col-md-2">
		          		<label>Área:</label>
		          		<select class="form-control" name="usu_idarea">
		          			@foreach ($areas as $area)
								<option value="{{ $area->ar_idarea }}">{{ $area->ar_nombre }}</option>
		          			@endforeach
		          		</select>
		          	</div>
		          	<div class="form-group col-md-2">
		          		<label>Rol:</label>
		          		<select class="form-control" name="usu_idrol">
		          			@foreach ($roles as $rol)
								<option value="{{ $rol->rol_idrol }}">{{ $rol->rol_nombre }}</option>
		          			@endforeach
		          		</select>
		          	</div>
		          	<div class="form-group col-md-2">
		          		<label>Estatus:</label>
		          		<select class="form-control" name="usu_estatus">
		          			<option value="Activo">Activo</option>
		          			<option value="Inactivo">Inactivo</option>
		          		</select>
		          	</div><br>
					
					<div class="col-md-12"><br>
						<div class="text-center">
							<div class="col-md-3 col-md-offset-3">	
								<button type="submit" class="btn btn-primary">
									<span class="fa fa-floppy-o"></span> Registrar
		        		 		</button>
							</div>
							<div class="col-md-1">
								<a href="{{ url('/usuarios') }}" class="btn btn-default">Salir <span class="fa fa-ban"></span></a>
							</div>
			          		
			          	</div><br>
					</div><br>
		          	
	          	</form>
    </div>
          
 @endsection