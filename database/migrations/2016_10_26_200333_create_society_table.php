<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocietyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('societys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('direccion',100);
            $table->string('razon_social',100);
            $table->string('ruc',11);
            $table->string('descripcion',150);            
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
        Schema::drop('societys');
    }
}
