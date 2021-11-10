@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Información de usuarios</h1>
@stop

@section('content')
  
<div class="content justify-content-center">
        <div class="card " >                  
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-right">
                        <a href= "{{route('users')}} " class="btn btn-sm btn-info btn-bg-inea">Listado de usuarios</a>
                    </div>
                </div>
                <div class="m-3">
                   <table class="table">
                       <tbody>
                           <tr>
                                <th>Nombre</th>
                               <td> {{$user->name}} </td>
                           </tr>
                           <tr>
                                <th>Correo</th>
                               <td>{{$user->email}} </td>
                           </tr>
                           <tr>
                                <th>Roles</th>
                                <td>
                                    @forelse($user->roles as $role)    
                                                                
                                        <span class="badge badge-info"> {{$role->name}}</span>
                                    @empty
                                        <span class="badge badge-danger"> Sin roles asignados</span>

                                    @endforelse
                                </td>
                           </tr>
                       </tbody>
                   </table>
                </div>                 
            </div>
</div>
  
                        
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/style.css">
@stop

@section('js')
    <script> 
        
    </script>
@stop