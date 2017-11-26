<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChalansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('chalans',function(Blueprint $table){
            $table->increments('id');
            $table->string('chalan_id');
            $table->string('user_id');
            $table->string('name');
            $table->string('cnic');
            $table->string('issue_date');
            $table->string('school');
            $table->string('amount');
            $table->string('due_date');
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
        Schema::dropIfExists('chalans');
    }
}
