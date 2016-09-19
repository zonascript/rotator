<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type',20);
            $table->string('value',50);
            $table->text('completed');
            $table->bigInteger('refer')->nullable();
            $table->timestamp('updated_at');
            $table->timestamp('created_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('wallet');
    }
}
