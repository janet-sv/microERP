<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToSalesordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salesorders', function (Blueprint $table) {
            $table->integer('id_cliente')->unsigned()->nullable();            
            $table->integer('id_sociedad')->unsigned();
            $table->integer('id_proforma')->unsigned()->nullable();
            $table->foreign('id_cliente')->references('id')->on('customers');
            $table->foreign('id_sociedad')->references('id')->on('societys');
            $table->foreign('id_proforma')->references('id')->on('offers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salesorders', function (Blueprint $table) {
            $table->dropForeign(['id_cliente'])->onDelete('cascade');
            $table->dropForeign(['id_sociedad'])->onDelete('cascade');
            $table->dropForeign(['id_proforma'])->onDelete('cascade');
        });
    }
}
