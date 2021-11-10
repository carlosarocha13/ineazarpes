@extends('adminlte::page')

@section('title', 'Permisos')

@section('content_header')
    <h1>Detalle de permisos</h1>
@stop

@section('content')
   
    <div class="card">                  
       <div class="card-body">
            <div class="row">
                <div class="col-12 text-right">
                    <a href= "{{route('permissions')}} " class="btn btn-sm btn-info">Volver/crear</a>
                </div>
            </div>
            <div class="my-3">
                <p>Plantilla de admiLTE para copiar - escriba su codigo aquí</p>                  
            </div>
        </div>                 
     </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/style.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop