<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marina extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','siglas','rif','adm_portuario','estado','sector','municipio','direccion','coordenadas','descripcion','tipo_instalacion','maritima_fluvial_lacustre','especialidad','tipo_carga','segun_propiedad','segun_destinacion','segun_funcion','segun_interes'];

}
