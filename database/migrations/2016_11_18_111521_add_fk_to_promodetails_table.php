<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToPromodetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('promodetails', function (Blueprint $table) {
            $table->integer('id_promocion')->unsigned();            
            $table->integer('id_producto')->unsigned();
            $table->foreign('id_promocion')->references('id')->on('promotions');
            $table->foreign('id_producto')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promodetails', function (Blueprint $table) {
            $table->dropForeign(['id_promocion'])->onDelete('cascade');
            $table->dropForeign(['id_producto'])->onDelete('cascade');
        });
    }
}
