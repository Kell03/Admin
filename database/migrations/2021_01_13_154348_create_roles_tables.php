<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                     Schema::create('role_user', function (Blueprint $table) {
              
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('label')->nullable();
            $table->timestamps();

        });
          
          Schema::table('role_user', function (Blueprint $table) {

            $table->bigIncrements('user_id');
            $table->string('user_name');
            $table->string('user_label')->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

        });
      }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_tables');
    }
}
