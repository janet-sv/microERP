<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToSalesorderdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salesorderdetails', function (Blueprint $table) {
            $table->integer('id_promocion')->unsigned()->nullable();            
            $table->integer('id_producto')->unsigned();
            $table->integer('id_pedido_venta')->unsigned();
            $table->foreign('id_promocion')->references('id')->on('promotions');
            $table->foreign('id_producto')->references('id')->on('products');            
            $table->foreign('id_pedido_venta')->references('id')->on('salesorders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salesorderdetails', function (Blueprint $table) {
            $table->dropForeign(['id_promocion'])->onDelete('cascade');
            $table->dropForeign(['id_producto'])->onDelete('cascade');
            $table->dropForeign(['id_pedido_venta'])->onDelete('cascade');
        });
    }
}
