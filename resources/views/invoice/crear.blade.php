@extends('adminlte::page')

@section('title', 'Registro inventario')
@section('plugins.ValidarCampos', true)
@section('content_header')
<meta name="csrf-token" content="<?php echo csrf_token() ?>"/>
<h1>Nueva factura</h1> 

oyohohhoi

 
@stop

@section('content')

  <invoice></invoice>
@stop



@section('css')
 
@stop

@section('js')
    


<script src="{{asset('vendor/components/invoice.tag')}}" type="riot/tag"></script>

<script>
$(document).ready(function(){

riot.mount('invoice');
})
</script>
 <script>
        function baseUrl(url) {
            return '{{url('')}}/' + url;
        }
        $(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
})
    </script>



@stop
