<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guias', function (Blueprint $table) {
            $table->id();
            $table->string('guia');
            $table->integer('chofer');
            $table->string('nombre');
            $table->string('placa');
            $table->string('dueño');
             $table->string('origen');
             $table->string('destino');
             $table->string('carga');
             $table->string('status');
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
        Schema::dropIfExists('guia');
    }
}
