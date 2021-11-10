@extends('adminlte::page')

@section('title', 'Capitanias')

@section('content_header')
    <h1>Listado de capitanias</h1>
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
                    <a href= "capitanias/create" class="btn btn-sm btn-info">Nueva</a>
                </div>
            </div>
            <div class="my-3">
            <table class="table table-striped table-bordered" style="width:100%" id="TableCapitanias">
                <thead class="text-primary">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th class="text-center">Acciones</th>                     
                </thead>
                <tbody>
                @foreach($capitanias as $capitania)
                        <tr>
                            <td> {{$capitania->id}} </td>
                            <td>{{$capitania->nombre}} </td>
                                    
                            <td class="text-center"> 
                                <a class="btn btn-sm btn-info" href=" {{route('capitanias.edit',$capitania->id)}}" >                        
                                    <i class="fa fa-edit"></i>
                                 </a>
                                
                                 <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-id="{{$capitania->id}}" data-nombre="{{$capitania->nombre}}" data-target="#deletemodal{{$capitania->id}}">
                                 <i class="fa fa-trash"></i>
                                </button>

                                                                    <!-- Modal -->
                                    <div class="modal fade" id="deletemodal{{$capitania->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar registro</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div id="bodymodal" class="modal-body">
                                            Realmente desea eliminar el registro <b>{{$capitania->nombre}}</b>  ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn  btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                             <form action="{{route('capitanias.destroy',$capitania->id)}}" id="delete{{$capitania->id}}" method="post"  style="display:inline-block;">
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

     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

@stop

@section('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script> 
        $(document).ready(function() {
            $('#TableCapitanias').DataTable();

            setTimeout(function(){
                $('#msj').fadeOut(1000);
            }, 5000)
        } );

         
    </script>
@stop