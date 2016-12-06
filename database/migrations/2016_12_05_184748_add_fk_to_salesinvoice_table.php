<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToSalesinvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salesinvoice', function (Blueprint $table) {
            $table->integer('id_salesorder')->unsigned()->nullable(); 
            $table->string('description');
            $table->double('discount', 6, 2);
            $table->foreign('id_salesorder')->references('id')->on('salesorders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salesinvoice', function (Blueprint $table) {
            $table->dropForeign(['id_salesorder'])->onDelete('cascade');
        });
    }
}
