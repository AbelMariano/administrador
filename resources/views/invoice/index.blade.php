@extends('adminlte::page')

@section('title', 'Registro inventario')

@section('plugins.ValidarCampos', true)
@section('plugins.Riot', true)



@section('content_header')
    <h1>Comporbantes de pago</h1> 

   <a class="btn btn-primary " href="{{url('invoice/add')}}">Nuevo comprobante</a>

@stop

@section('content')

 <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Client</th>
                        <th style="width:100px;" class="text-right">IVA</th>
                        <th style="width:160px;" class="text-right">Sub Total</th>
                        <th style="width:160px;" class="text-right">Total</th>
                        <th style="width:180px;" class="text-right">Creado</th>
                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($model as $m)
                    <tr>
                        <td>
                            <a href="{{url('invoice/detail/' . $m->id )}}">
                                {{ $m->client->name }}
                            </a>
                        </td>
                        <td class="text-right">$ {{number_format($m->iva, 2)}}</td>
                        <td class="text-right">$ {{number_format($m->subTotal, 2)}}</td>
                        <td class="text-right">$ {{number_format($m->total, 2)}}</td>
                        <td class="text-right">{{ $m->created_at  }}</td>
                        <td class="text-right">
                            <a class="btn btn-success btn-block btn-xs" href="{{ url('invoice/pdf/' . $m->id) }}">
                                <i class="fa fa-file-pdf-o"></i> Descargar
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
@stop



  





@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script type="text/javascript">$(document).ready(function() {
    $('#example').DataTable();
} );</script>



@stop