<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offerdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->float('descuento',5,2);
            $table->float('precio_unitario',5,2);
            $table->float('total',5,2);
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
        Schema::drop('offerdetails');
    }
}
