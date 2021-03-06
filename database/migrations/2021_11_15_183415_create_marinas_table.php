<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marinas', function (Blueprint $table) {
            $table->id();
            $table->string('siglas',10);
            $table->string('rif',11);
            $table->string('nombre',150);
            $table->string('adm_portuario',50);
            $table->string('estado',50);
            $table->string('sector',50);
            $table->string('municipio',50);
            $table->string('direccion',300);
            $table->string('coordenadas',150);
            $table->text('descripcion');
            $table->string('tipo_instalacion',50);
            $table->string('maritima_fluvial_lacustre',25);
            $table->string('especialidad',50);
            $table->string('tipo_carga',50);
            $table->string('segun_propiedad',50);
            $table->string('segun_destinacion',50);
            $table->string('segun_funcion',50);
            $table->string('segun_interes',50);
           




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marinas');
    }
}
