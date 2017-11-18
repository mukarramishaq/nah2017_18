<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePersonalInformations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('personal_informations',function(Blueprint $table){
            $table->increments('id');
            $table->string('user_id');
            $table->string('name')->nullable();
            $table->string('picture_path')->nullable();
            $table->string('gender')->nullable();
            $table->string('cnic')->nullable();
            $table->string('mobile_no')->nullable();
            $table->string('emergency_no')->nullable();
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
        //
        Schema::dropIfExists('personal_informations');
    }
}
