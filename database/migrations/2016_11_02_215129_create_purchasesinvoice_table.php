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
            $table->date('date_invoice');
            $table->integer('number');
            $table->date('date_due');
            $table->double('amount_total_signed', 6, 2);
            $table->double('residual_signed', 6, 2);
            $table->double('subtotal', 6, 2);
            $table->double('igv', 6, 2);
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
