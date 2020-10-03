
<!-- Modal -->
<div class="modal fade" id="EliminarUsuario{{$Product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-ice-cream"></i> Eliminar Articulo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Esta seguro que desea eliminar <b>"{{$Product->name}} {{$Product->peso}} {{$Product->unidad}}"</b>?

        <center>
          <i class="fas fa-exclamation-triangle" style="font-size: 120px;color: red"></i>

        </center>

        <form method="POST" action="{{route('Product.destroy',$Product)}}">
          @csrf
          @method('DELETE')
         
      </div>
      <div class="col-sm-12">
<center>   
<button  class="btn btn-secondary" type="button" data-dismiss="modal" aria-label="Close"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</button>
 <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Aceptar</button>
</form>
</center>
<br>
</div>
    </div>
  </div>
</div>