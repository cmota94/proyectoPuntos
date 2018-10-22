@extends('layout')

@section('title', '- usuarios registrar')


@section('contenido')
	
	<div class="col-md-10 col-md-offset-1">
		<h2 class="page-header"><span class="fa fa-calendar"></span> Actualizar evento: <small>{{ $evento[0]->act_nombre }}</small> </h2>   <br>
	</div>

    <div class="col-md-10 col-md-offset-1">
    	<form class="form" action="{{ url('eventos/actualizar/'.$evento[0]->act_idactividad) }}" method="post">

					<ul>
          @foreach ($errors->all() as $error)
              <li class="alert alert-danger">{{$error}}</li>
          @endforeach
        </ul>

        @if (session('status'))
          <div class="alert alert-success">
            {{session('status')}}
          </div>
        @endif

        <input type="hidden" name="_token" value="{!! csrf_token() !!}"> 
        <!-- Codigo que nos permite enviar los datos, ya que envia un token -->


      	<div class="form-group col-md-6">
      		<label>Nombre de la actividad:</label>
      		<input type="text" name="act_nombre" class="form-control" value="{{ $evento[0]->act_nombre }}">
      	</div>
      	<div class="form-group col-md-4">
      		<label>Responsable(s):</label>
      		<input type="text" name="act_responsable" class="form-control" value="{{ $evento[0]->act_responsable }}">
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
      		<select class="form-control" name="sub_idSubcategoria">
				@foreach ($subcategorias as $subcategoria)
					<option value="{{ $subcategoria->sub_idsubcategoria }}">{{ $subcategoria->sub_nombre }}</option>
				@endforeach
      		</select>
      	</div>
		
      	<div class="form-group col-md-3">
      		<label>Fecha inicio del evento:</label>
      		<input type="date" name="act_fechaInicio" class="form-control" value="{{ $evento[0]->act_fechainicio }}">
      	</div>
      	<div class="form-group col-md-2">
      		<label>Fecha fin del evento:</label>
      		<input type="date" name="act_fechaFin" class="form-control hora" value="{{ $evento[0]->act_fechafin }}" id="hora">
      	</div>
      	<div class="form-group col-md-3">
      		<label>Hora inicio del evento:</label>
      		<input type="text" name="act_horaInicio" class="form-control hora" value="{{ $evento[0]->act_horainicio }}" id="hora">
      	</div>
      	<div class="form-group col-md-2">
      		<label>Hora fin del evento:</label>
      		<input type="text" name="act_horaFin" class="form-control hora" value="{{ $evento[0]->act_horafin }}">
      	</div>
      	<div class="form-group col-md-4">
      		<label>Lugar del evento:</label>
      		<select class="form-control" name="rec_idRecinto">
           
              @foreach ($recintos as $recinto)
               <option value="{{ $recinto->rec_idrecinto }}">{{ $recinto->rec_nombre }}</option>
              @endforeach
      		</select>
      	</div>
      	<div class="form-group col-md-2">
      		<label>Puntos otorgados:</label>
      		<input type="number" name="act_numeroPuntos" class="form-control" value="{{ $evento[0]->act_numeropuntos }}">
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
      		<textarea name="act_descripcion" class="form-control" rows="1" >{{ $evento[0]->act_descripcion }}</textarea>
      	</div>
        <div class="form-group col-md-4">
          <label>Usuario que registró el evento:</label>
          <p>{{ $evento[0]->usu_nombre }}</p>
        </div>
			   <input type="hidden" name="ar_idArea" value="{{ Auth::user()->usu_idarea }}">
      	<br>
		
    		<div class="col-md-12">
    			<div class="text-center">
    				<button type="submit" class="btn btn-primary">
    		 			<span class="fa fa-floppy-o"></span> Aceptar
    		 		</button>
              		<a href="{{ url('/eventos') }}" class="btn btn-default"><span class="fa fa-ban"></span> Cancelar</a>
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