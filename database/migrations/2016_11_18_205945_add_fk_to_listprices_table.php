<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToListpricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('listprices', function (Blueprint $table) {            
            $table->integer('id_producto')->unsigned();            
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
        Schema::table('listprices', function (Blueprint $table) {
            $table->dropForeign(['id_producto'])->onDelete('cascade');
        });
    }
}
