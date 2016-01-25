<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerminalsTable extends Migration
{

    public function up()
    {
        Schema::create('terminals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->integer('city_id')->unsigned();

            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::drop('terminals');
    }
}
