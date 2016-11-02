<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('provider', function (Blueprint $table) {
            $table->increments('id') ;
            $table->string('name');
            $table->integer('ruc')->unique()->nullable();
            $table->string('country');
            $table->string('department');
            $table->string('province');
            $table->string('district');
            $table->string('address')->unique()->nullable();
            $table->string('website')->unique()->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('fax', 5)->nullable();
            $table->string('mail')->unique()->nullable();
            $table->integer('dni_contact')->unique()->nullable();
            $table->string('title_contact')->nullable();
            $table->string('contact')->nullable();
            $table->string('job')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('provider');
    }
}
