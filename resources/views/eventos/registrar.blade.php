@extends('layout')

@section('title', '- usuarios registrar')


@section('contenido')
	
	<div class="col-md-10 col-md-offset-1">
		<h2 class="page-header"><span class="fa fa-calendar"></span> Registrar evento </h2><br>
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
          		<input type="text" name="act_nombre" class="form-control">
          	</div>

          	<div class="form-group col-md-4">
          		<label>Responsable(s):</label>
          		<input type="text" name="act_responsable" class="form-control">
          	</div>

          	<div class="form-group col-md-2">
          		<label>Tipo de actividad:</label>
          		<select class="form-control" name="act_tipo">
          			<option value="FCA">FCA</option>
          			<option value="UNAM">UNAM</option>
          			<option value="Externa">Externa</option>
          		</select>
          	</div>

          	<div class="form-group col-md-2">
          		<label>Subcategoría:</label>
          		<select class="form-control" name="act_idsubcategoria">
    					@foreach ($subcategorias as $subcategoria)
    						<option value="{{ $subcategoria->sub_idsubcategoria }}">{{ $subcategoria->sub_nombre }}</option>
    					@endforeach
          		</select>
          	</div>
			
          	<div class="form-group col-md-3">
          		<label>Fecha inicio del evento:</label>
          		<input type="date" name="act_fechainicio" class="form-control">
          	</div>

          	<div class="form-group col-md-2">
          		<label>Fecha fin del evento:</label>
          		<input type="date" name="act_fechafin" class="form-control">
          	</div>

          	<div class="form-group col-md-3">
          		<label>Hora inicio del evento:</label>
          		<input type="text" name="act_horainicio" class="form-control hora" id="hora">
          	</div>

          	<div class="form-group col-md-2">
          		<label>Hora fin del evento:</label>
          		<input type="text" name="act_horafin" class="form-control hora" id="hora">
          	</div>

          	<div class="form-group col-md-4">
          		<label>Lugar del evento:</label>
          		 <select class="form-control" name="act_idlugar" id="cantidad" onchange="createTexts(this)">
                <option value="" selected="selected">Seleccionar</option>
                @foreach ($recintos as $recinto)
                  <option value="{{ $recinto->rec_idrecinto }}">{{ $recinto->rec_nombre }}</option>
                @endforeach
                <option value="1">Otro</option>
              </select>
          	</div>
            
            <div id="cajas"></div>

          	<div class="form-group col-md-2">
          		<label>Puntos otorgados:</label>
          		<input input[type=number] { -moz-appearance:textfield; } name="act_numeropuntos" class="form-control">
          	</div>

          		<div class="form-group col-md-2">
          		<label>Estatus:</label>
          		<select class="form-control" name="act_estatus">
          			<option value="Por realizar">Por realizar</option>
          			<option value="Realizado">Realizado</option>
          			<option value="Cancelado">Cancelado</option>
          		</select>
          	</div>

          	<div class="form-group col-md-4">
          		<label>Descripción:</label>
          		<textarea name="act_descripcion" class="form-control" rows="1"></textarea>
          	</div>

            <div class="form-group col-md-6 col-md-offset-3">
              <label>Subir puntos:</label>
              <textarea class="form-control"></textarea>
            </div>

				    <input type="hidden" name="act_idarea" value="{{ Auth::user()->usu_idarea }}">
            <input type="hidden" name="bit_idusuario" value="{{ Auth::user()->id }}">

            <input type="hidden" name="bit_dispositivo" value="{{ $_SERVER['HTTP_USER_AGENT'] }}">
            <input type="hidden" name="bit_navegador" value="{{ substr($_SERVER['HTTP_USER_AGENT'], 0,9) }}">
            <input type="hidden" name="bit_direccionip" value="{{ $_SERVER['REMOTE_ADDR'] }}">
          	<br>
			
			<div class="col-md-12">
				<div class="text-center">
					<button type="submit" class="btn btn-primary">
    		 			<span class="fa fa-floppy-o"></span> Registrar
    		 		</button>
	          		<a href="{{ url('/eventos') }}" class="btn btn-default">
	          			<span class="fa fa-ban"></span> Salir
	          		</a>
	          	</div><br>
			</div><br>
		          	
	    </form>
    </div>  
	
      
          
 @endsection

 @section('js')

<script type="text/javascript">
  
  /*function createTexts(sel) {
    var num = sel.value;
    if( !num ) num = sel.options[sel.selectedIndex].value;
    if( !num ) return;

    var html="<div class=\"col-md-3\" ><label>Ingrese el nuevo lugar:</label><input type=\"text\" name=\"act_lugar\" class=\"form-control\" /></div>";
    num = parseInt( num );
    var dest = document.getElementById("cajas");
    for( i = 0; i < num; i++ ) {
         dest.innerHTML += html;
    }
  }*/

  $(document).ready(function(){
    $('.hora').timepicker({
        timeFormat: 'HH:mm',
        /*minTime: '00:00', // 11:45:00 AM,
        maxHour: 22,
        maxMinutes: 30,*/
        startTime: new Date(0,0,0,0,0,0), // 3:00:00 PM - noon
        //interval: 1 // 15 minutes*/
    });
});
</script>


 @endsection