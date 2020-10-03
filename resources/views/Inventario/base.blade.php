@extends('adminlte::page')

@section('title', 'Registro inventario')

@section('plugins.Barcode', true)
@section('plugins.ValidarCampos', true)



@section('content_header')
    <h1> <i class="fas fa-fw fa-warehouse"></i> Detalles Del Inventario</h1> 
<br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
  Nuevo Producto
</button>
@include('Inventario.ModalRegistrar')
@stop

@section('content')

@if(Session::has('message'))
<div class="alert alert-success" role="alert">
  <center>{{Session::get('message')}} <i class="fas fa-check"></i></center>
</div>


@endif



 <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr><th>Codigo de barra</th>
                <th>Descripcion del Producto</th>
                <th>Editar</th>
                <th>Eliminar</th>
                </tr>
        </thead>
        <tbody>
			@foreach($imprimir as $Product)  
            <tr>
            	<td>
                <center> {!! DNS1D::getBarcodeSVG( str_pad ($Product->id, 4, '0', STR_PAD_LEFT), 'C39',1.3,55)!!}
                </center>
                </td>

                <td>
                {{$Product->name}}, 
                Cantidad Disponible {{$Product->cantidad}},
                Peso {{$Product->peso}}  {{$Product->unidad}}, 
                Costo {{$Product->price}}$</td>
                
                <td>
               <center> <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#EditarUsuario{{$Product->id}}"> <i class = "fas fa-edit" ></i></button></center>@include('Inventario.ModalEditar')
                </td>
                <td>
               <center> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#EliminarUsuario{{$Product->id}}">
                 <i class = "fas fa-trash-alt" ></i> </button>@include('Inventario.ModalEliminar')</center>
                </td>
                  
            </tr>
           @endforeach
        </tfoot>
    </table>
@stop



  





@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script type="text/javascript">$(document).ready(function() {
    $('#example').DataTable();
} );</script>



@stop