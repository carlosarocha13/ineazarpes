@extends('adminlte::page')

@section('title', 'Marinas Deportivas')

@section('content_header')
    <h1>Marinas Deportivas</h1>
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
                    <a href= "marinas/create" class="btn btn-sm btn-info">Nueva</a>
                </div>
            </div>
            <div class="my-3">
            <table class="table table-striped table-bordered" style="width:100%" id="TableMarinas">
                <thead class="text-primary">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th class="text-center">Acciones</th>                     
                </thead>
                <tbody>
                @foreach($marinas as $marina)
                        <tr>
                            <td> {{$marina->id}} </td>
                            <td>{{$marina->nombre}} </td>
                                    
                            <td class="text-center"> 
                                <a class="btn btn-sm btn-info" href=" {{route('marinas.edit',$marina->id)}}" >                        
                                    <i class="fa fa-edit"></i>
                                 </a>
                                
                                 <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-id="{{$marina->id}}" data-nombre="{{$marina->nombre}}" data-target="#deletemodal{{$marina->id}}">
                                 <i class="fa fa-trash"></i>
                                </button>

                                                                    <!-- Modal -->
                                    <div class="modal fade" id="deletemodal{{$marina->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar registro</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div id="bodymodal" class="modal-body">
                                            Realmente desea eliminar el registro <b>{{$marina->nombre}}</b>  ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn  btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                             <form action="{{route('marinas.destroy',$marina->id)}}" id="delete{{$marina->id}}" method="post"  style="display:inline-block;">
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
@stop

@section('js')
    <script src="/js/functions.js"></script>
    <script> console.log('Hi!'); </script>
@stop