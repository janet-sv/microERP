<?php

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
         Schema::create('bank', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->string('debit');
            $table->string('payment');
            $table->string('amount');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bank');
    }
}
