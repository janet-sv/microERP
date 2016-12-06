<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkToOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->integer('id_cliente')->unsigned()->nullable();            
            $table->integer('id_sociedad')->unsigned();
            $table->foreign('id_cliente')->references('id')->on('customers');
            $table->foreign('id_sociedad')->references('id')->on('societys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->dropForeign(['id_cliente'])->onDelete('cascade');
            $table->dropForeign(['id_sociedad'])->onDelete('cascade');
        });
    }
}
