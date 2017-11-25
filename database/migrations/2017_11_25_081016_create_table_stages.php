<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('stages',function(Blueprint $table){
            $table->increments('id');
            $table->string('user_id');
            $table->boolean('is_personal_info_done')->default(false);
            $table->boolean('is_educational_info_done')->default(false);
            $table->boolean('is_professional_info_done')->default(false);
            $table->boolean('is_guest_info_done')->default(false);

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
        Schema::dropIfExists('stages');
    }
}
