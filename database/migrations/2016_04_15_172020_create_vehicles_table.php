<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{

    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_vehicle_id')->unsigned();
            $table->integer('trademark_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->integer('terminal_id')->unsigned();
            $table->string('patent');
            $table->string('year');
            $table->string('code');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('vehicles');
    }
}
