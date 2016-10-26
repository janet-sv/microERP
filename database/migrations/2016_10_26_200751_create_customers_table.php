<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tipo_contribuyente');
            $table->string('nombre',50);
            $table->string('apellido_paterno',50);
            $table->string('apellido_materno',50);
            $table->string('razon_social',50);
            $table->string('ruc',11);
            $table->integer('sexo');
            $table->integer('tipo_documento');
            $table->string('numero_documento',15);
            $table->float('porcentaje_descuento',3);            
            $table->integer('plazo_credito');
            $table->integer('estado');            
            $table->integer('id_sociedad')->unsigned();
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
        Schema::drop('customers');
    }
}
