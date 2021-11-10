@extends('adminlte::page')

@section('title', 'Capitanias')

@section('content_header')
    <h1>Modificación de capitania / circunscripción acuática</h1>
@stop

@section('content')
  
<div class="content justify-content-center">
        <div class="card " >                  
            <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-right">
                            <a href= "{{route('capitanias')}} " class="btn btn-sm btn-info btn-bg-inea">Listado de capitanías</a>
                        </div>
                    </div>
                    <div>
                    <form action= "{{route('capitanias.update', $capitania->id)}} " method="post" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label for="nombre">Nombre de la capitanía o circunscripción acuática:</label>
                                <input type="text" class="form-control" id="nombre" placeholder="Nombre de la capitanía o circunscripción acuática" name="nombre" value= "{{ $capitania->nombre }}"  required>
                                 @if($errors->has('nombre'))
                                    <span class="error text-danger" for='input-nombre'>
                                            {{ $errors->first('nombre') }}
                                    </span>
                                 @endif
                            </div>
                        </div>
                        @can('permission_index')
                        <div class="col-md-2 text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-bg-inea">Guardar</button>
                        </div>
                        @endcan
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