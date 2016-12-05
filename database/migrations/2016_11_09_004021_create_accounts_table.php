<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('accounts', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('code');
            $table->string('name');
            $table->string('account_level');
            $table->string('account_type');
            $table->string('analysis_type');
            $table->integer('debit');
            $table->integer('credit');
            $table->integer('bank_id')->nullable();
            $table->string('bank_cuenta')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('accounts');
    }
}
