<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentmethodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('paymentmethod', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('name');
            $table->integer('numeration');
            $table->string('type_id')->references('id')->on('paymenttype');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('paymentmethod');
    }
}
