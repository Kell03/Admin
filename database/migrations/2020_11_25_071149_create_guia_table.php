<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guia', function (Blueprint $table) {
            $table->id();
            $table->string('guia');
            $table->string('chofer');
            $table->string('placa');
            $table->string('dueño');

             $table->string('origen');
             $table->string('destino');
             $table->string('carga');
             $table->string('status');
            $table->timestamps();
        });
         
         Schema::table('guia', function ($table) {
   $table->string('dueño')->after('placa');
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
