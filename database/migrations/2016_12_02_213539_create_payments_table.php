<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('payment', function (Blueprint $table) {
            
            $table->increments('id');
            $table->date('date');
            $table->integer('number');
            $table->string('client');
            $table->double('amount', 6, 2);
            $table->integer('reference')->nullable();
            $table->string('state');
            $table->integer('method')->references('id')->on('paymentmethod');
            $table->integer('type')->references('id')->on('paymenttype');
                        
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('payment');
    }
}
