<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountantseatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('accountantseat', function (Blueprint $table) {
            
            $table->increments('id');
            $table->date('date');
            $table->string('code');
            $table->integer('number');
            $table->string('company')->references('id')->on('journal');
            $table->string('reference');
            $table->string('diario_id')->references('id')->on('journal');
            $table->double('amount', 6, 2);
            $table->string('state');
                        
         }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::drop('accountantseat');
    }
}
