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
            $table->string('nombre',50)->nullable();
            $table->string('apellido_paterno',50)->nullable();
            $table->string('apellido_materno',50)->nullable();
            $table->string('razon_social',100)->nullable();
            $table->string('direccion',100)->nullable();
            $table->string('ruc',11)->nullable();
            $table->integer('sexo')->nullable();
            $table->integer('tipo_documento')->nullable();
            $table->string('numero_documento',15)->nullable();
            $table->float('porcentaje_descuento',5,2)->nullable();            
            $table->integer('plazo_credito')->nullable();
            $table->float('linea_credito', 7, 2)->nullable();
            $table->float('monto_adeudado', 7, 2)->nullable();
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
