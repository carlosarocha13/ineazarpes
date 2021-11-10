@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Listado de usuarios</h1>
@stop

@section('content')
   
                            <div class="card">
                                 
                                <div class="card-body">
                                    @if(session('success'))
                                        <div class="alert alert-success" id="msj" role="success">
                                            <button type="button" class="close success-op" data-dismiss="alert" aria-label="close">
                                                &times;
                                            </button>
                                                {{session('success')}}
                                        </div>
                                    @endif
                                    @if(session('danger'))
                                        <div class="alert alert-danger" id="msjdanger" role="danger">
                                            <button type="button" class="close danger-op" data-dismiss="alert" aria-label="close">
                                                &times;
                                            </button>
                                                {{session('danger')}}
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-12 text-right">
                                            <a href= "{{route('users.create')}} " class="btn btn-sm btn-info btn-bg-inea">Nuevo</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered" style="width:100%" id="TableUsers">
                                            <thead class="text-primary">
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Correo</th>
                                             
                                                <th>Roles</th>
                                                <th class="text-center">Acciones</th>
                                                
                                            </thead>
                                            <tbody>
                                                @foreach($users as $user)
                                                    <tr>
                                                        <td> {{$user->id}} </td>
                                                        <td>{{$user->name}} </td>
                                                        <td>{{$user->email}} </td>
                                                        
                                                        <td>
                                                            @forelse($user->roles as $role)    
                                                                
                                                                <span class="badge badge-info"> {{$role->name}}</span>
                                                            @empty
                                                                <span class="badge badge-danger"> Sin roles asignados</span>

                                                            @endforelse
                                                        </td>
                                                        <td class="text-center"> 
                                                            <a class="btn btn-sm btn-info" href=" {{route('users.edit',$user->id)}}" >
                                                                 
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-success" href=" {{route('users.show',$user->id)}}" >
                                                                <i class="fa fa-search"></i>
                                                            </a>
                                                      

                                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-id="{{$user->id}}" data-nombre="{{$user->nombre}}" data-target="#deletemodal{{$user->id}}">
                                 <i class="fa fa-trash"></i>
                                </button>

                                                                    <!-- Modal -->
                                    <div class="modal fade" id="deletemodal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar usuario</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div id="bodymodal" class="modal-body">
                                            Realmente desea eliminar al usuario <b>{{$user->name}}</b>  ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn  btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                             <form action="{{route('users.destroy',$user->id)}}" id="delete{{$user->id}}" method="post"  style="display:inline-block;">
                                                                        @csrf 
                                                                        @method('DELETE')
                                                                        <button class="btn btn-sm btn-danger" type="submit">
                                                                            Eliminar
                                                                        </button>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>

  
                                                            
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                    </table>
                                    </div>
                                </div>
                                 
                            </div>
                       
         

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    
@stop

@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="/js/functions.js"></script>

<script>
$(document).ready(function() {
    $('#TableUsers').DataTable();
 
} );
 
</script>
@stop