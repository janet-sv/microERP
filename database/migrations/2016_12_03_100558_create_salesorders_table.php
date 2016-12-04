<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salesorders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numeracion');            
            $table->date('fecha_creacion');            
            $table->string('descripcion',150)->nullable();
            $table->float('descuento_manual',5,2);
            $table->float('sub_total',5,2);
            $table->float('igv',5,2);
            $table->float('total',5,2);
            $table->integer('estado');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('salesorders');
    }
}
