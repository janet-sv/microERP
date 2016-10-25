<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesinvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('salesinvoice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date_invoice');
            $table->string('number');
            $table->string('date_due');
            $table->string('amount_total_signed');
            $table->string('residual_signed');
            $table->string('state');

            $table->string('partner_id')->references('id')->on('partner');
            $table->string('user_id')->references('id')->on('user');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::drop('salesinvoice');

    }
}
