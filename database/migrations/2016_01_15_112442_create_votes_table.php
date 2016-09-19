<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table){
            $table->increments('id');
            $table->integer('faucet_id')->unsigned();
            $table->string('ip',20);
            $table->boolean('vote');
        });

        Schema::table('votes', function($table) {
            $table->foreign('faucet_id')->references('id')->on('faucets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('votes');
    }
}
