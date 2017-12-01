<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses',function(Blueprint $table){
            $table->increments('id');
            $table->string('user_id');
            $table->boolean('from_registration')->default(0);
            $table->boolean('from_finance')->default(0);
            $table->string('status')->default('pending');
            $table->string('updated_by')->default('default');

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
        Schema::dropIfExists('statuses');
        
    }
}
