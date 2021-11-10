@extends('adminlte::page')

@section('title', 'Permisos')

@section('content_header')
    <h1>Creación de permisos</h1>
@stop

@section('content')
  
<div class="content justify-content-center">
        <div class="card " >                  
            <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-right">
                            <a href= "{{route('permissions')}} " class="btn btn-sm btn-info btn-bg-inea">Listado de permisos</a>
                        </div>
                    </div>
                    <div>
                    <form action= "{{route('permissions.store')}} " method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="name" placeholder="Nombre del permiso" name="name" value= "{{ old('name') }}" required>
                                 @if($errors->has('name'))
                                    <span class="error text-danger" for='input-name'>
                                            {{ $errors->first('name') }}
                                    </span>
                                 @endif
                            </div>
                        </div>
                        <div class="col-md-2 text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-bg-inea">Guardar</button>
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
@stop

@section('js')
    <script> 
        
    </script>
@stop