<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToOfferdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offerdetails', function (Blueprint $table) {
            $table->integer('id_promocion')->unsigned()->nullable();            
            $table->integer('id_producto')->unsigned();
            $table->integer('id_proforma')->unsigned();
            $table->foreign('id_promocion')->references('id')->on('promotions');
            $table->foreign('id_producto')->references('id')->on('products');            
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
        Schema::table('offerdetails', function (Blueprint $table) {
            $table->dropForeign(['id_promocion'])->onDelete('cascade');
            $table->dropForeign(['id_producto'])->onDelete('cascade');
            $table->dropForeign(['id_proforma'])->onDelete('cascade');
        });
    }
}
