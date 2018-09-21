<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad', function (Blueprint $table) {
            $table->increments('act_idActividad');
            $table->char('act_nombre', 150);
            $table->char('act_responsable', 100);
            $table->date('act_fechaInicio');
            $table->date('act_fechaFin');
            $table->time('act_horaInicio');
            $table->time('act_horaFin');
            $table->integer('act_numeroPuntos');
            $table->char('act_descripcion', 100);
            $table->char('act_estatus', 20);
            $table->integer('ar_idArea')->unsigned();
            $table->integer('sub_idSubcategoria')->unsigned();
            $table->integer('lug_idLugar')->unsigned();
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
        Schema::dropIfExists('actividad');
    }
}
