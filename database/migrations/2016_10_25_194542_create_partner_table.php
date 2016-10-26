<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
       Schema::create('partner', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('country');
            $table->string('department');
            $table->string('province');
            $table->string('district');
            $table->string('address')->unique()->nullable();
            $table->string('website')->unique()->nullable();
            $table->string('job');
            $table->string('phone', 15)->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('fax')->nullable();
            $table->string('mail')->unique()->nullable();
            $table->string('title')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('partner');
         
    }
}
