<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEducationalInformations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         //
         Schema::create('educational_informations',function(Blueprint $table){
             $table->increments('id');
             $table->string('user_id');
             $table->string('reg_no')->nullable();
             $table->string('degree')->nullable();
             $table->string('school')->nullable();
             $table->string('discipline')->nullable();
             $table->string('enrollment_year')->nullable();
             $table->string('graduation_year')->nullable();
             $table->boolean('has_alumni_card')->nullable();

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
         Schema::dropIfExists('educational_informations');
     }
}
