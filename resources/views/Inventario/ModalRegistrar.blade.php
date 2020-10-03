
<section>

<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
<div class="modal-content">

<div class="modal-header">
<h5 class="modal-title" id="exampleModalScrollableTitle"><i class="fas fa-ice-cream"></i> Agregar Producto</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<style type="text/css">
  
</style>
 <form action="{{route('Product.store')}}" method="POST"  class="needs-validation" >
  @csrf
 <div class="col-xs-12">
 <div class="modal-body">
 <div class="tile">
 <div class="tile-body">
 <div class="container">
 <div class="row">
  
  
  <div class="col-sm-9">
  @if($errors->has('name'))
  <label class="control-label" for="name" >Campo Requerido:</label>
  <input class="form-control  is-invalid " type="text" value="" name="name"  
  onkeypress="return soloLetras(event)">
  @else
  <label class="control-label" for="validationTooltip01" >Producto:</label>
  <input class="form-control" id="validationTooltip01" type="text" value="{{old('name')}}" name="name" 
  onkeypress="return soloLetras(event)" required>
  @endif
  </div>



  <div class="col-sm-3">
  @if($errors->has('cantidad'))
  <label class="control-label" for="cantidad">Campo Requerido:</label>
  <input class="form-control  is-invalid " type="text" value="" name="cantidad" 
   onkeypress="return soloNumeros(event)">
  @else
  <label class="control-label" for="cantidad" >Cantidad:</label>
  <input class="form-control" type="text" value="{{old('cantidad')}}" name="cantidad" 
   onkeypress="return soloNumeros(event)"  required>
  @endif
  </div>



  <div class="col-sm-2">
  @if($errors->has('peso'))
  <label class="control-label" for="peso">Campo Requerido:</label>
  <input class="form-control  is-invalid " type="text" value="" name="peso"
   onkeypress="return soloNumeros(event)">
  @else
  <label class="control-label" for="peso" >Peso:</label>
  <input class="form-control" type="text" value="{{old('peso')}}" name="peso"
   onkeypress="return soloNumeros(event)"  required>
  @endif
  </div>


  <div class="col-sm-3">
  @if($errors->has('unidad'))
  <label class="control-label" for="unidad">Campo Requerido:</label>
  <select class="form-control is-invalid" name="unidad">
  <option></option>
  <option>Ml</option>
  <option>G</option> 
  <option>Kg</option>  
  </select>
  @else
  <label class="control-label" for="unidad">Seleccione:</label>
  <select class="form-control" name="unidad"  required>
  <option></option>
  <option>Ml</option>
  <option>G</option> 
  <option>Kg</option>  
  </select>
  @endif
  </div>


  <div class="col-sm-3">
  @if($errors->has('price'))
  <label class="control-label" for="price">Campo Requerido:</label>
  <input class="form-control  is-invalid " type="text" value="" name="price"
   onkeypress="return soloNumeros(event)">
  @else
  <label class="control-label" for="price" >Precio:</label>
  <input class="form-control" type="text" value="{{old('price')}}" name="price"
   onkeypress="return soloNumeros(event)"  required>
  @endif<br>
  </div>

  <div class="col-sm-4">
  @if($errors->has('iva'))
  <label class="control-label" for="iva">Campo Requerido:</label>
  <select class="form-control is-invalid" name="iva">
  <option></option>
  <option value="0.21">IVA (21%)</option>
  <option value="0.10">IVA (10%)</option>
  <option value="0.4">IVA (4%)</option>
  <option value="0">Exentas de IVA</option>
  </select>
  @else
  <label class="control-label" for="iva">Iva:</label>
  <select class="form-control" name="iva"  required>
  <option></option>
  <option value="0.21">IVA (21%)</option>
  <option value="0.10">IVA (10%)</option>
  <option value="0.4">IVA (4%)</option>
  <option value="0">Exentas de IVA</option>
  </select>
  @endif
  </div>




<div class="col-sm-12">
<center>   
<button  class="btn btn-secondary" type="button" data-dismiss="modal" aria-label="Close"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</button>
 <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>
</form>
</center>
</div>

</div>
</div>
</div>
</div>
</section>