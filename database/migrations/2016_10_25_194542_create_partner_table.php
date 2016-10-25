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
            $table->string('address')->unique();
            $table->string('website')->unique();
            $table->string('job');
            $table->char('phone', 9);
            $table->char('mobile', 7);
            $table->string('fax');
            $table->string('mail')->unique();
            $table->string('title');

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
