@extends('layout')


@section('title', '- usuarios')

@section('contenido')


	@if (session('status'))
		<div class="alert alert-success">
			{{session('status')}}
		</div>
	@endif

		<!-- Principio del buscador -->
		
			<div class="col-sm-4 col-md-8 col-md-offset-1">
				<h2 class="page-header"><span class="fa fa-user-o"></span> Usuarios 
					<a href="{{ url('usuarios/registrar') }}" class="btn btn-primary">
						Registrar <span class="fa fa-plus"></span>
					</a>  
				</h2> 
			</div><br><br>
			<div class="col-md-3 pull-right">
				<div class="text-center">
					<button type="button" data-toggle="modal" data-target="#modalBuscar" class="btn btn-primary active">Buscar <span class="fa fa-search"></span></button>
				</div>
			</div>

			

			<!--<div class="col-md-4">
			<form action=" {{ url('/usuarios') }}" class="form-inline pull-right" method="GET" id="search">
				<div class="input-group">
      				<input type="text" class="form-control" placeholder="Buscar..." name="searchText" aria-describedby="search">
      				<span class="input-group-btn">
        				<button class="btn btn-outline-primary" type="button"><span class="fa fa-search " id="search"></span></button>
     				</span>
    			</div><!-- /input-group --
			</form>
			</div>-->
		<br>
		

		<!-- Fin del buscador -->

		<!-- TABLA DE CONTENIDO -->
		<div class="col-md-10 col-md-offset-1">
			<div class="table-responsive rounded panel panel-default">
			<table class=" display table table-hover text-center border" id="tabla"> <!-- -->
				<thead class="thead-light active">
					<tr class="active">
						<th class="text-center">Nombre(s)</th>
						<th class="text-center">Apellido paterno</th>
						<th class="text-center">Apellido materno</th>
						<th class="text-center">Correo electrónico</th>
						<!--<th class="text-center">Área</th>-->
						<th class="text-center">Rol</th>
						<th class="text-center">Estatus</th>
						<th colspan="2" class="text-center">Opciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($usuarios as $usuario)
						<tr>
							<td>{!! $usuario->usu_nombre !!}</td>
							<td>{!! $usuario->usu_apellidoPaterno !!}</td>
							<td>{!! $usuario->usu_apellidoMaterno !!}</td>
							<td>{!! $usuario->email !!}</td>
							<td>{!! $usuario->rol_nombre !!}</td>
							
							@if ($usuario->usu_estatus == 'Activo')
								<td><button class="btn btn-success active">{!! $usuario->usu_estatus !!}</button></td>
							@else
								<td><button class="btn btn-danger active">{!! $usuario->usu_estatus !!}</button></td>
							@endif

							
							<td colspan="2">
								<form action="{{ url('/usuarios/estatus/'.$usuario->id)}}" method="post">
									<input type="hidden" name="_token" value="{!! csrf_token() !!}"> 
				      				<button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Cambiar estatus"><span class="fa fa-refresh"></span></button>
				      				<a href="{{ url('usuarios/actualizar/'.$usuario->id) }}" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar"><span class="fa fa-pencil-square-o"></span>
									</a>
				      			</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="text-center">
			{{ $usuarios->render() }}
		</div>
		
		</div>		
		


<!-- Modal cambiar estatus --> 
  <div class="modal fade" id="modalEstatus" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="fa-refresh fa "></span> Cambiar estatus</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
	        	<form>
		          	<div class="form-group col-md-6">
		          		<label>Estatus:</label>
						<select class="form-control" name="estatus">
							<option value="Activo">Activo</option>
							<option value="Inactivo">Inactivo</option>
						</select>
		          	</div>
	          	</form>
        	</div>
          
        </div>
        <div class="modal-footer">
        	<div class="text-center">
        		 <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        		 <button type="submit" class="btn btn-info">Aceptar</button>
        	</div>
         
        </div>
      </div>
      
    </div>
  </div>



<!-- Modal buscar --> 
  <div class="modal fade" id="modalBuscar" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header"> 
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="fa-user-o fa "></span> Buscar usuarios</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
	        	<form action=" {{ url('/usuarios') }}" method="post">
	        		<input type="hidden" name="_token" value="{!! csrf_token() !!}"> 
		          	<div class="form-group col-md-4">
		          		<label for="nombre">Nombre</label>
		          		<input type="text" name="usu_nombre" class="form-control">
		          	</div>
					<div class="form-group col-md-4">
		          		<label for="nombre">Apellido paterno:</label>
		          		<input type="text" name="usu_apellidoPaterno" class="form-control">
		          	</div>
					<div class="form-group col-md-4">
		          		<label>Rol:</label>
						<select class="form-control" name="rol_nombre" class="form-control">
							<option value=""></option>
							@foreach ($roles as $rol)
								<option value="{{ $rol->rol_idRol }}">{{ $rol->rol_nombre }}</option>
							@endforeach
						</select>
		          	</div>
		          	<div class="text-center">
		        		<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        		<button type="submit" class="btn btn-info">Buscar <span class="fa fa-search"></span></button>
		        	</div>
	          	</form>
        	</div>
          
        </div>
        <div class="modal-footer">
        	
         
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