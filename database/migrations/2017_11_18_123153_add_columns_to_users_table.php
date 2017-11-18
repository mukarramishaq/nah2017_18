<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users',function(Blueprint $table){
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_verified')->default(false);
            $table->string('verification_token');
            $table->string('uuid')->nullable(); //this will be unique user id meeting specific critaria
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
        Schema::table('users',function(Blueprint $table){
            $table->dropColumn('is_admin');
            $table->dropColumn('is_verified');
            $table->dropColumn('verification_token');
            $table->dropColumn('uuid');
        });
    }
}
