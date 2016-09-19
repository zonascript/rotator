<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaucetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faucets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('coins_id')->unsigned();
            $table->string('site',50);
            $table->string('refer',100);
            $table->integer('captcha_id')->unsigned();
            $table->integer('script_id')->unsigned();
            $table->integer('period');
            $table->integer('wait');
            $table->boolean('register');
            $table->integer('rewards');
            $table->integer('antibot');
            $table->boolean('published');
            $table->boolean('paid')->default(true);
            $table->boolean('browser');
            $table->integer('votes');
            $table->timestamp('updated_at');
            $table->timestamp('created_at');
        });

        Schema::table('faucets', function($table) {
            $table->foreign('coins_id')->references('id')->on('coins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('faucets');
    }
}
