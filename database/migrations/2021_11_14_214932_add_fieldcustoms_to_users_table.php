<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldcustomsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('apellidos');
            $table->string('tipo_documento');
            $table->string('numero_identificacion');
            $table->string('telefono');
            $table->string('direccion');
            $table->renameColumn('name', 'nombres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('nombres', 'name');
            $table->dropColumn('apellidos');
            $table->dropColumn('tipo_documento');
            $table->dropColumn('numero_identificacion');
            $table->dropColumn('telefono');
            $table->dropColumn('direccion');

        });
    }
}
