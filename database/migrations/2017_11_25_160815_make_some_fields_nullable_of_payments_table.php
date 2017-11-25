<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeSomeFieldsNullableOfPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('payments',function(Blueprint $table){
            $table->string('resident')->nullable()->change();
            $table->string('payment_method')->nullable()->change();
            $table->string('chalan_id')->nullable()->change();
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
        Schema::table('payments',function(Blueprint $table){
            $table->string('resident')->change();
            $table->string('payment_method')->change();
            $table->string('chalan_id')->change();
        });
    }
}
