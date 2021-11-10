@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Creación de usruarios</h1>
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
                    <div>
                    <form action= "{{route('users.store')}} " method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name">Nombre:</label>
                                <input type="text" class="form-control" id="name" placeholder="nombre y apellido" name="name" value= "{{ old('name') }}" required>
                                 @if($errors->has('name'))
                                    <span class="error text-danger" for='input-name'>
                                            {{ $errors->first('name') }}
                                    </span>
                                 @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" placeholder="Correo electrónico" name="email" value= "{{ old('email') }}" required>
                                @if($errors->has('email'))
                                    <span class="error text-danger" for='input-email'>
                                            {{ $errors->first('email') }}
                                    </span>
                                 @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" value= "{{ old('password') }}" required>
                                @if($errors->has('password'))
                                    <span class="error text-danger" for='input-password'>
                                            {{ $errors->first('password') }}
                                    </span>
                                 @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="password_confirm">Password:</label>
                                <input type="password" class="form-control" id="password_confirm" placeholder="Confirmar password" name="password_confirm" value= "{{ old('password_confirm') }}" required>
                                @if($errors->has('password_confirm'))
                                    <span class="error text-danger" for='input-password_confirm'>
                                            {{ $errors->first('password_confirm') }}
                                    </span>
                                 @endif
                            </div>
                        </div>
                    </div>     
                        
                    <div class="row mb-3">
                        <div class="col-md-12">
                        <div class="form-group">
                            <div class="tab-content">
                                <div class="tap-pane active">
                                    <label class="h6 mt-3" >Roles:</label>

                                    <div class="container">
                                        <div class="row">
                                            @foreach($roles as $id => $role)
                                            <div class="col-3">
                                                <div class="form-check form-check-inline mt-sm-2" style="float:left">
                                                    <input class="form-check-input form-field-acceptconditions" type="checkbox" name="roles[]" id="{{$id}}" value="{{$id}}" data-toggle="tooltip" data-placement="right" title=" {{$role}} ">
                                                    <p class="form-check-label" for="inlineCheckbox1 texto-recortado">{{ $role}}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                        
                                        
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        </div>
                        
                    </div> 

        <div class="text-center">
            <button type="submit" class="btn btn-primary btn-bg-inea">Guardar</button>
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