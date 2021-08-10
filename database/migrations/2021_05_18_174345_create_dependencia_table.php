<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependencia', function (Blueprint $table) {
            $table->increments('iddependencia');//$table->id();
            $table->string('depe_nombre');
            $table->string('depe_abreviado');
            $table->string('depe_sigla');
            $table->string('depe_representante');
            $table->string('depe_cargo');
            $table->string('depe_depende');
            $table->string('depe_superior');
            $table->string('depe_tipo');
            $table->string('depe_proyectado');
            $table->string('depe_estado');
            $table->string('depe_observaciones');
            
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
        Schema::dropIfExists('dependencia');
    }
}
