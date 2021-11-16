@extends('adminlte::page')

@section('title', 'Marinas deportivas')

@section('content_header')
    <h1>Creación de marinas deportivas</h1>
@stop

@section('content')
  
<div class="content justify-content-center">
        <div class="card " >                  
            <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-right">
                            <a href= "{{route('marinas')}} " class="btn btn-sm btn-info btn-bg-inea">Listado de marinas deportivas</a>
                        </div>
                    </div>
                    <div>
                        <form action= "{{route('marinas.store')}} " method="post" class="needs-validation" novalidate>
                        @csrf
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nombre">Nombre:</label>
                                        <input type="text" class="form-control" id="nombre" placeholder="Nombre de marina deportiva" name="nombre" value= "{{ old('nombre') }}" maxlength="150" required>
                                        @if($errors->has('nombre'))
                                            <span class="error text-danger" for='input-nombre'>
                                                    {{ $errors->first('nombre') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="siglas">Siglas:</label>
                                        <input type="text" class="form-control" id="siglas" placeholder="Siglas" name="siglas" value= "{{ old('siglas') }}" maxlength="7" required>
                                        @if($errors->has('siglas'))
                                            <span class="error text-danger" for='input-siglas'>
                                                    {{ $errors->first('siglas') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="rif">Rif.</label>
                                        <input type="text" class="form-control" id="rif" placeholder="Rif" name="rif" value= "{{ old('rif') }}" maxlength="11" required>
                                        @if($errors->has('rif'))
                                            <span class="error text-danger" for='input-rif'>
                                                    {{ $errors->first('rif') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="adm_portuario">Administrador portuario:</label>
                                        <input type="text" class="form-control" id="adm_portuario" placeholder="Nombre de la capitanía o circunscripción acuática" name="adm_portuario" value= "{{ old('adm_portuario') }}" maxlength="50" required>
                                        @if($errors->has('adm_portuario'))
                                            <span class="error text-danger" for='input-adm_portuario'>
                                                    {{ $errors->first('adm_portuario') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="coordenadas">Coordenadas</label>
                                        <input type="text" class="form-control" id="coordenadas" placeholder="Coordenadas" name="coordenadas" value= "{{ old('coordenadas') }}" maxlength="150" required>
                                        @if($errors->has('coordenadas'))
                                            <span class="error text-danger" for='input-coordenadas'>
                                                    {{ $errors->first('coordenadas') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
   
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tipo_instalacion">Tipo de instalación</label>
                                        <input type="text" class="form-control" id="tipo_instalacion" placeholder="Tipo de instalación" name="tipo_instalacion" value= "{{ old('tipo_instalacion') }}" maxlength="50" required>
                                        @if($errors->has('tipo_instalacion'))
                                            <span class="error text-danger" for='input-tipo_instalacion'>
                                                    {{ $errors->first('tipo_instalacion') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        
                                            <label for="maritima_fluvial_lacustre">Maritima, Fluvial, Lacustre</label>
                                            <select id="maritima_fluvial_lacustre" class="form-control" name="maritima_fluvial_lacustre" required>
                                                <option value="Maritima">Maritima</option>
                                                <option value="Fluvial">Fluvial</option>
                                                <option value="Lacustre">Lacustre</option>
                                            </select>
                                        
                                        @if($errors->has('maritima_fluvial_lacustre'))
                                            <span class="error text-danger" for='input-maritima_fluvial_lacustre'>
                                                    {{ $errors->first('maritima_fluvial_lacustre') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="especialidad">Especialidad</label>
                                        <input type="text" class="form-control" id="especialidad" placeholder="especialidad" name="especialidad" value= "{{ old('especialidad') }}" maxlength="25" required>
                                        @if($errors->has('especialidad'))
                                            <span class="error text-danger" for='input-especialidad'>
                                                    {{ $errors->first('especialidad') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tipo_carga">Tipo de carga</label>
                                        <input type="text" class="form-control" id="tipo_carga" placeholder="Tipo de carga" name="tipo_carga" value= "{{ old('tipo_carga') }}" maxlength="50" required>
                                        @if($errors->has('tipo_carga'))
                                            <span class="error text-danger" for='input-tipo_carga'>
                                                    {{ $errors->first('tipo_carga') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="segun_pripiedad">Según propiedad</label>
                                        <input type="text" class="form-control" id="segun_pripiedad" placeholder="Según pripiedad" name="segun_pripiedad" value= "{{ old('segun_pripiedad') }}" maxlength="25" required>
                                        @if($errors->has('segun_pripiedad'))
                                            <span class="error text-danger" for='input-segun_pripiedad'>
                                                    {{ $errors->first('segun_pripiedad') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="segun_destinacion">Según destinacion</label>
                                        <input type="text" class="form-control" id="segun_destinacion" placeholder="Según destinación" name="segun_destinacion" value= "{{ old('segun_destinacion') }}" maxlength="25" required>
                                        @if($errors->has('segun_destinacion'))
                                            <span class="error text-danger" for='input-segun_destinacion'>
                                                    {{ $errors->first('segun_destinacion') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
 
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="segun_funcion">Según función</label>
                                        <input type="text" class="form-control" id="segun_funcion" placeholder="Segun función" name="segun_funcion" value= "{{ old('segun_funcion') }}" maxlength="25" required>
                                        @if($errors->has('segun_funcion'))
                                            <span class="error text-danger" for='input-segun_funcion'>
                                                    {{ $errors->first('segun_funcion') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="segun_interes">Según interés</label>
                                        <input type="text" class="form-control" id="segun_interes" placeholder="Según interés" name="segun_interes" value= "{{ old('segun_interes') }}" maxlength="25" required>
                                        @if($errors->has('segun_interes'))
                                            <span class="error text-danger" for='input-segun_interes'>
                                                    {{ $errors->first('segun_interes') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <input type="text" class="form-control" id="estado" placeholder="Estado" name="estado" value= "{{ old('estado') }}" required>
                                        @if($errors->has('estado'))
                                            <span class="error text-danger" for='input-estado'>
                                                    {{ $errors->first('estado') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="municipio">Municipio</label>
                                        <input type="text" class="form-control" id="municipio" placeholder="Municipio" name="municipio" value= "{{ old('municipio') }}" maxlength="50" required>
                                        @if($errors->has('municipio'))
                                            <span class="error text-danger" for='input-municipio'>
                                                    {{ $errors->first('municipio') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="sector">Sector</label>
                                        <input type="text" class="form-control" id="sector" placeholder="sector" name="sector" value= "{{ old('sector') }}" maxlength="25" required>
                                        @if($errors->has('sector'))
                                            <span class="error text-danger" for='input-sector'>
                                                    {{ $errors->first('sector') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                        <textarea   class="form-control" id="direccion" placeholder="Dirección" name="direccion" value= "{{ old('direccion') }}" maxlength="300" required></textarea>
                                        @if($errors->has('direccion'))
                                            <span class="error text-danger" for='input-direccion'>
                                                    {{ $errors->first('direccion') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <textarea   class="form-control" id="descripcion" placeholder="Descripción" name="descripcion" value= "{{ old('descripcion') }}" maxlength="1000" required></textarea>
                                        @if($errors->has('descripcion'))
                                            <span class="error text-danger" for='input-descripcion'>
                                                    {{ $errors->first('descripcion') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-12 text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-bg-inea">Guardar</button>
                                </div>
                            </div>
                            </form>
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
    <script> 
        
    </script>
@stop