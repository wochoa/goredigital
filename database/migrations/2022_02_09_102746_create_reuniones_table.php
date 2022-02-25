<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReunionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reuniones', function (Blueprint $table) {
            //$table->id();
            $table->increments('idreuniones');
            $table->integer('id_depereunion');// la dependencia que lo crea
            $table->integer('id_userreunion');// el usuario que lo crea la reunion
            $table->string('tit_reunion');
            $table->string('slug_reunion');
            $table->string('fecha_reunion');
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
        Schema::dropIfExists('reuniones');
    }
}
