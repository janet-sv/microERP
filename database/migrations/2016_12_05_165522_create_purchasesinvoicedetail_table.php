<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesinvoicedetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('purchasesinvoicedetail', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('invoice_id')->references('id')->on('purchasesinvoice');
            $table->integer('product_id')->references('id')->on('product');
             $table->integer('code')->references('id')->on('accounts');
            $table->integer('amount');
            $table->double('unitprice', 6, 2);
            $table->double('discounts', 6, 2);
            $table->double('total', 6, 2);
                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::drop('purchasesinvoicedetail');
    }
}
