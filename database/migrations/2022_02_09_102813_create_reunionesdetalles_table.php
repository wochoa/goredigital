<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReunionesdetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reunionesdetalles', function (Blueprint $table) {
            $table->increments('id_detareuniones');
            $table->integer('id_reuniones');
            $table->integer('iduser');
            $table->integer('iddependencia');
            $table->string('nombres');// nombres y apellidos
            $table->string('dni');
            $table->string('celular');
            $table->string('cargo');
            $table->string('email');
            $table->string('preguntaincluida');
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
        Schema::dropIfExists('reunionesdetalles');
    }
}
