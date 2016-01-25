<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('country_id')->unsigned();

            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::drop('cities');
    }
}
