@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Consulta de rol  </h1>
@stop

@section('content')
   
    <div class="card"> 
    <div class="card-header ">
                            
        <div class="row">
            <div class="col-10">
            Rol <b>{{$role->name}} </b> 
            </div>
            <div class="col-2 text-right">
                    <a href= "{{route('roles')}} " class="btn btn-sm btn-info">Listado</a>
            </div>
        </div>   
                        </div>                 
       <div class="card-body">
           
            
            <div class="my-3">
            <div class="container">
                 
                    <div class="row">
                        @forelse($role->permissions as $permission)
                            <div class="col-md-4 border rounded p-2"> {{$permission->name}}</div>
                                
                        @empty
                            <div class="col-md-12 border rounded p-2"> Sin permisos asignados</div>
                                 
                        @endforelse
                    </div>
                            
                           
                        
                

                </div>
            </div>
            
            
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