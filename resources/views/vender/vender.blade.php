@extends('adminlte::page')

@section('title', 'Registro inventario')
@section('plugins.ValidarCampos', true)
@section('content_header')
<meta name="csrf-token" content="<?php echo csrf_token() ?>"/>
<h1> <i class="fas fa-file-invoice"></i> Nueva factura</h1> 


<br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
  Agregar Cliente
</button>

  @if(session("mensaje"))
  <br><br>
    <div class="alert alert-{{session('tipo') ? session("tipo") : "info" }}">
    <center>{{session('mensaje')}} </center>
     </div>
@endif


@stop

@section('content')
 <div class="row">
        <div class="col-12">
          
          
            <div class="row">
                <div class="col-12 col-md-6">
                    <form action="{{route('terminarOCancelarVenta')}}" method="post">
                       
                        <div class="form-group">
                            <label for="codigo">DNI</label>
                            <input  autocomplete="off" required autofocus  type="text"class="form-control" placeholder="DNI" name="id_cliente" id="id_cliente">
                        </div>
                        </div>
                        @if(session("productos") !== null)
                            <div class="form-group">
                                <button name="accion" value="terminar" type="submit" class="btn btn-success">Terminar
                                    venta
                                </button>
                                <button name="accion" value="cancelar" type="submit" class="btn btn-danger">Cancelar
                                    venta
                                </button>
                            </div>
                        @endif
                    </form>
                </div>
                <div class="col-12 col-md-6">
                    <form action="{{route("agregarProductoVenta")}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="codigo">Código de barras</label>
                            <input id="codigo" autocomplete="off" required autofocus name="codigo" type="text"
                                   class="form-control"
                                   placeholder="Código de barras">
                        </div>
                    </form>
                </div>
            </div>
            @if(session("productos") !== null)
                <h2>Total: ${{number_format($total, 2)}}</h2>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Código de barras</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Quitar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(session("productos") as $producto)
                            <tr>
                                <td>
                <center> {!! DNS1D::getBarcodeSVG( str_pad ($producto->codigo_barras, 4, '0', STR_PAD_LEFT), 'C39',1.3,55)!!}
                </center>
                </td>



                                
                                <td>{{$producto->descripcion}}</td>
                                <td>${{number_format($producto->precio_venta, 2)}}</td>
                                <td>{{$producto->cantidad}}</td>
                                <td>
                                    <form action="{{route("quitarProductoDeVenta")}}" method="post">
                                        @method("delete")
                                        @csrf
                                        <input type="hidden" name="indice" value="{{$loop->index}}">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                
            @endif
        </div>
    </div>
@stop


