@extends('adminlte::page')

@section('title', 'Marinas')

@section('content_header')
    <h1>Consulta de marinas deportivas </h1>
@stop

@section('content')
   
    <div class="card"> 
    <div class="card-header ">
                            
        <div class="row">
            <div class="col-8">
            Datos de la marina deportiva</b> 
            </div>
            <div class="col-4 text-right">
                    <a href= "{{route('marinas')}} " class="btn btn-sm btn-info btn-bg-inea">Listado de marinas deportivas</a>
            </div>
        </div>   
                        </div>                 
       <div class="card-body">
           
            
            <div class="my-3">
            <div class="container">
                 
                   <table class="table table-light">
                       <thead class="thead-light">
                           
                       </thead>
                       <tbody>
                       <tr>
                               <th width="25%" class="bg-light">Nombre</th>
                               <td> {{ $marina->nombre  }} </td>
                           </tr>
                           <tr>
                               <th class="bg-light">Rif</th>
                               <td>{{ $marina->rif  }}</td>
                           </tr>
                           <tr>
                               <th class="bg-light">Siglas</th>
                               <td>{{ $marina->siglas  }}</td>
                           </tr>
                           <tr>
                               <th class="bg-light">Administrador Portuario</th>
                               <td>{{ $marina->adm_portuario  }}</td>
                           </tr>
                           <tr>
                               <th class="bg-light">Coordenadas</th>
                               <td>{{ $marina->coordenadas  }}</td>
                           </tr>
                           <tr>
                               <th class="bg-light">Tipo de instalación</th>
                               <td>{{ $marina->tipo_instalacion  }}</td>
                           </tr>
                           <tr>
                               <th class="bg-light">Maritima, Fluvial, Lacustre</th>
                               <td> {{ $marina->maritima_fluvial_lacustre}} </td>
                           </tr>
                           <tr>
                               <th class="bg-light">Especialidad</th>
                               <td>{{ $marina->especialidad  }}</td>
                           </tr>
                           <tr>
                               <th class="bg-light">Tipo de carga</th>
                               <td>{{ $marina->tipo_carga  }}</td>
                           </tr>
                           <tr>
                               <th class="bg-light">Según propiedad</th>
                               <td>{{ $marina->segun_propiedad  }}</td>
                           </tr>
                           <tr>
                               <th class="bg-light">Según destinación</th>
                               <td>{{ $marina->segun_destinacion  }}</td>
                           </tr>
                           <tr>
                               <th class="bg-light">Según función</th>
                               <td>{{ $marina->segun_funcion  }}</td>
                           </tr>
                           <tr>
                               <th class="bg-light">Según interés</th>
                               <td>{{ $marina->segun_interes  }}</td>
                           </tr>
                           <tr>
                               <th class="bg-light">Estado</th>
                               <td>{{ $marina->estado  }}</td>
                           </tr>
                           <tr>
                               <th class="bg-light">Municipio</th>
                               <td>{{ $marina->municipio  }}</td>
                           </tr>
                           <tr>
                               <th class="bg-light">Sector</th>
                               <td>{{ $marina->sector  }}</td>
                           </tr>
                           <tr>
                               <th class="bg-light">Dirección</th>
                               <td>{{ $marina->direccion  }}</td>
                           </tr>
                           <tr>
                               <th class="bg-light">Descripción</th>
                               <td>{{ $marina->descripcion  }}</td>
                           </tr>
                           
                           
                           
                       </tbody>
                       
                   </table>
                            
                           
                        
                

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
    <script> console.log('Hi!'); </script>
@stop