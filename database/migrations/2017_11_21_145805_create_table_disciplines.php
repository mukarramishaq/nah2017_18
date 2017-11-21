<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDisciplines extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         //
         Schema::create('disciplines',function(Blueprint $table){
             $table->increments('id');
             $table->string('school_id');
             $table->string('name');
             $table->string('abbrev')->nullable();
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
         Schema::dropIfExists('disciplines');
     }
}
