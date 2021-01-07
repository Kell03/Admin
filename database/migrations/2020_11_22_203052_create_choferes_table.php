<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChoferesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choferes', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->string('apellido');
            $table->integer('cedula');
            $table->string('placa');
            $table->biginteger('tlf');
            $table->timestamps();
        });

       Schema::table('choferes', function ($table) {
   $table->dropColumn('chuto');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('choferes');
    }
}
