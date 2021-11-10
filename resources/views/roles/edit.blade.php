@extends('adminlte::page')

@section('title', 'Permisos')

@section('content_header')
    <h1>Modificación de permisos</h1>
@stop

@section('content')
  
<div class="content justify-content-center">
        <div class="card " >                  
            <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-right">
                            <a href= "{{route('roles')}} " class="btn btn-sm btn-info btn-bg-inea">Listado de permisos</a>
                        </div>
                    </div>
                    <div>
                    <form action= "{{route('roles.update', $role->id)}} " method="post" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Nombre :</label>
                                <input type="text" class="form-control" id="name" placeholder="Nombre del permiso" name="name" value= "{{ $role->name }}" required>
                                 @if($errors->has('name'))
                                    <span class="error text-danger" for='input-name'>
                                            {{ $errors->first('name') }}
                                    </span>
                                 @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="h6 mt-3" >Permisos:</label>

                            <div class="container">
                                <div class="row">
                                    @foreach($permissions as $id => $permission)
                                    <div class="col-3">
                                        <div class="form-check form-check-inline mt-sm-2" style="float:left">
                                            <input class="form-check-input form-field-acceptconditions" type="checkbox" name="permissions[]" id="{{$id}}" value="{{$id}}" {{ $role->permissions->contains($id) ? 'checked' : '' }} data-toggle="tooltip" data-placement="right" title=" {{$permission}} ">
                                            <p class="form-check-label" for="inlineCheckbox1 texto-recortado">{{ $permission}}</p>
                                        </div>
                                    </div>
                                    @endforeach
                                
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-bg-inea">Modificar</button>
                        </div>
                    </div>

               
                   
            </div>     
                        
        
        
        
        </form>
                                
                    </div>
                </div>                 
            </div>
</div>
  
                        
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/style.css">
    <style>
        /* Inicio clases checkbox  */

input[type="checkbox"].form-field-acceptconditions {
    position: relative;
    width: 40px;
    height: 20px;
    -webkit-appearance: none;
    background: #c6c6c6;
    outline: none;
    border-radius: 20px;
    box-shadow: inset 0 0 5px rgba(255, 0, 0, 0.2);
    transition: 0.7s;
}

input:checked[type="checkbox"].form-field-acceptconditions {
  background: #01c89f;
}

input[type="checkbox"].form-field-acceptconditions:before {
  content: '';
  position: absolute;
  width: 20px;
  height: 20px;
  border-radius: 20px;
  top: 0;
  left: 0;
  background: #e4e4e4;
  transform: scale(1.1);
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  transition: .5s;
}

input:checked[type="checkbox"].form-field-acceptconditions:before {
  left: 20px;
}

.texto-recortado
{
    overflow: hidden;
    display: inline-block;
    width: 170px;
    text-overflow: ellipsis;
    white-space: nowrap;
    text-align: left;
}

/* Fin clases checkbox  */
    </style>
@stop

@section('js')
    <script> 
        
    </script>
@stop