<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('payments',function(Blueprint $table){
            $table->increments('id');
            $table->string('user_id');
            $table->string('resident');
            $table->string('payment_method');
            $table->string('chalan_id');
            $table->string('chalan_path')->nullable();
            $table->string('paid_chalan_path')->nullable();
            $table->bigInteger('amount')->nullable();
            $table->string('branch_address')->nullable();

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
        Schema::dropIfExists('payments');
    }
}
