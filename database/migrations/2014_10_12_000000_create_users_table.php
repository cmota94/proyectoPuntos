<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('usu_idUsuario');
            $table->string('usu_nombre');
            $table->string('usu_apellidoPaterno');
            $table->string('usu_apellidoMaterno');
            $table->string('usu_estatus');
            $table->string('usu_correoElectronico');
            $table->string('usu_contrasenia');
            $table->string('mod_idModulo');
            $table->string('ar_idArea');
            $table->rememberToken();
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
        Schema::dropIfExists('usuario');
    }
}
