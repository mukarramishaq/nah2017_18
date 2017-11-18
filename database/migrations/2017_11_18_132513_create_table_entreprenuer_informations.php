<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEntreprenuerInformations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         //
         Schema::create('entreprenuer_informations',function(Blueprint $table){
             $table->increments('id');
             $table->string('user_id');
            
             $table->string('industry')->nullable();
             $table->string('company_name')->nullable();
             $table->string('established_date')->nullable();
             $table->string('designation')->nullable();
             $table->string('company_logo_path')->nullable();
             $table->string('total_employees')->nullable();
             $table->string('total_nustian_employees')->nullable();
             $table->string('website_link')->nullable();
             $table->string('social_media_link')->nullable();

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
         Schema::dropIfExists('entreprenuer_informations');
     }
}
