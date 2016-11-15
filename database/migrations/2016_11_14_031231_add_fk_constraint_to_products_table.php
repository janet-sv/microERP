<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkConstraintToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            
            $table->integer('id_category')->unsigned();

            $table->foreign('id_category')->references('id')->on('product_categories');

            $table->integer('id_trademark')->unsigned();

            $table->foreign('id_trademark')->references('id')->on('trademarks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            
            $table->dropForeign(['id_category'])->onDelete('cascade');
            
            $table->dropForeign(['id_trademark'])->onDelete('cascade');
        
        });
    }
}
