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
            $table->date('date_invoice') ;
            $table->integer('number');
            $table->date('date_due');
            $table->double('amount_total_signed', 6, 2);
            $table->double('residual_signed', 6, 2);
            $table->string('state');
            $table->integer('reference')->nullable();            
            $table->string('partner_id')->references('id')->on('partner');
            $table->string('user_id')->references('id')->on('user');
            $table->string('document_id')->references('id')->on('document_type');

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
