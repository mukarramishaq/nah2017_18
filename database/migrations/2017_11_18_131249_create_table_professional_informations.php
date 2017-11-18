<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProfessionalInformations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         //
         Schema::create('professional_informations',function(Blueprint $table){
             $table->increments('id');
             $table->string('user_id');
             
             $table->string('employed')->nullable();
             $table->string('industry')->nullable();
             $table->string('organization')->nullable();
             $table->string('designation')->nullable();
             $table->string('country')->nullable();
             $table->string('city')->nullable();
             $table->string('address')->nullable();

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
         Schema::dropIfExists('professional_informations');
     }
}
