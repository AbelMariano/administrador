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
 
@stop

@section('content')
 <div class="row">
        <div class="col-12">
          
          
            <div class="row">
                <div class="col-12 col-md-6">
                    <form action="{{-- {{route("terminarOCancelarVenta")}} --}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="id_cliente">Cliente</label>
                            <select required class="form-control" name="id_cliente" id="id_cliente">
                                {{-- @foreach($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                @endforeach --}}
                            </select>
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
              {{--   <h2>Total: ${{number_format($total, 2)}}</h2> --}}
                <div class="table-responsive">
                    <table class="table table-bordered">
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
                       {{--  @foreach(session("productos") as $producto)
                            <tr>
                                <td>{{$producto->codigo_barras}}</td>
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
                        @endforeach --}}
                        </tbody>
                    </table>
                </div>
            @else
                
            @endif
        </div>
    </div>
@stop


