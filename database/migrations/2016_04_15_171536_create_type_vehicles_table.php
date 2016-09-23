<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('type_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('engine_cubic_id')->unsigned();
            $table->integer('weight_id')->unsigned();

            $table->foreign('engine_cubic_id')
                ->references('id')
                ->on('engine_cubics')
                ->onUpdate('cascade');

            $table->foreign('weight_id')
                ->references('id')
                ->on('weights')
                ->onUpdate('cascade');

        });
    }

    public function down()
    {
        Schema::drop('type_vehicles');
    }
}
