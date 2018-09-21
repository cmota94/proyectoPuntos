@section('buscar')

<div class="modal fade" id="modalEstatus" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="fa-refresh fa "></span> Buscar</h4>
        </div>
        <div class="modal-body">
        	<div class="row">
	        	<form>
		          	<div class="form-group col-md-6">
		          		<label>Nombre:</label>
		          		<input type="text" name="usu_nombre" class="form-control">
		          	</div>
	          	</form>
        	</div>
          
        </div>
        <div class="modal-footer">
        	<div class="text-center">
        		 <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        		 <button type="submit" class="btn btn-info">Registrar</button>
        	</div>
         
        </div>
      </div>
      
    </div>
  </div>


@endsection