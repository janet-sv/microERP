<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesinvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('purchasesinvoice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date_invoice') ;
            $table->integer('number');
            $table->string('date_due');
            $table->string('amount_total_signed');
            $table->string('residual_signed');
            $table->string('state');
            $table->integer('reference')->nullable();  
            $table->string('provider_id')->references('id')->on('provider');
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
        Schema::drop('purchasesinvoice');
    }
}
