<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountseatdetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accountseatdetail', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('accountseat_id')->references('id')->on('accountantseat');
            $table->integer('account_id')->references('id')->on('accounts');
            $table->integer('empresa_id')->references('id')->on('customers');
            $table->string('etiqueta');
            $table->double('debe',5,2);
            $table->double('haber',5,2);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('accountseatdetail');
    }
}
