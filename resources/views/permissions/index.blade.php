@extends('adminlte::page')

@section('title', 'Permisos')

@section('content_header')
    <h1>Permisos</h1>
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
            <div class="row">
                <div class="col-12 text-right">
                    <a href= "{{route('permissions.create')}} " class="btn btn-sm btn-info">Nuevo</a>
                </div>
            </div>
            <div class="my-3">
                
            <table class="table table-striped table-bordered" style="width:100%" id="TablePermissions">
                <thead class="text-primary">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Guard</th>
                    <th>Created_at</th>

                    <th class="text-center">Acciones</th>                     
                </thead>
                <tbody>
                    @forelse($permissions as $permission)
                        <tr>
                            <td> {{$permission->id}} </td>
                            <td>{{$permission->name}} </td>
                            <td>{{$permission->guard_name}} </td>
                            <td>{{$permission->created_at}} </td>
                                    
                            <td class="text-center"> 
                            <a class="btn btn-sm btn-success" href=" {{route('permissions.show',$permission->id)}}" >
                                <i class="fa fa-search"></i>
                            </a>
                                <a class="btn btn-sm btn-info" href=" {{route('permissions.edit',$permission->id)}}" >                        
                                    <i class="fa fa-edit"></i>
                                 </a>
                                
                                 <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-id="{{$permission->id}}" data-nombre="{{$permission->name}}" data-target="#deletemodal{{$permission->id}}">
                                 <i class="fa fa-trash"></i>
                                </button>

                                                                    <!-- Modal -->
                                    <div class="modal fade" id="deletemodal{{$permission->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar registro</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div id="bodymodal" class="modal-body">
                                            Realmente desea eliminar el registro <b>{{$permission->name}}</b>  ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn  btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                             <form action="{{route('permissions.destroy',$permission->id)}}" id="delete{{$permission->id}}" method="post"  style="display:inline-block;">
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
                        @empty
                        <tr>
                            <td colspan="5" class="text-center"> No existen registros para mostrar </td>
                        
                        </tr>
                    @endforelse
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
            $('#TablePermissions').DataTable();

            
        } );
    </script>
@stop