<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('model_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trademark_id')->unsigned();
            $table->string('name', 50);
        });
    }

    public function down()
    {
        Schema::drop('model_vehicles');
    }
}
