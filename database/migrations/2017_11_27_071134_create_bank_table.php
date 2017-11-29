<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('bank',function(Blueprint $table){
            $table->increments('id');
            $table->string('bank_name')->default('Habib Bank Limited (HBL)');
            $table->string('bank_account_name')->default('NUST Alumni Support & Activities');
            $table->string('bank_account_number')->default('22927000804103');
            $table->string('bank_branch')->default('NUST, H-12 Sector, Islamabad');
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
        Schema::dropIfExists('bank');
    }
}
