<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGandolasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
Schema::create('gandolas', function (Blueprint $table) {
            $table->id();
            $table->string('propietario');
            $table->string('marca');
            $table->string('modelo');
            $table->string('placa');
            $table->string('descripcion');
            $table->enum('estado',['dañado', 'optimo'])->nullable();
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
        Schema::dropIfExists('gandolas');
    }
}
