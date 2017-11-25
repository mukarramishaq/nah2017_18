<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('stages',function(Blueprint $table){
            $table->boolean('is_residence_done')->default(false);
            $table->boolean('is_payment_method_done')->default(false);
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
        Schema::table('stages',function(Blueprint $table){
            $table->dropColumn('is_residence_done');
            $table->dropColumn('is_payment_method_done');
        });
    }
}
