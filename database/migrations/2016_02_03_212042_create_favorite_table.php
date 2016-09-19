<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoriteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite', function (Blueprint $table){
            $table->increments('wallet_id')->unsigned();
            $table->longText('faucets');
        });

        Schema::table('favorite', function($table) {
            $table->foreign('wallet_id')->references('id')->on('wallet')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('favorite');
    }
}
