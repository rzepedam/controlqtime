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
        });
    }

    public function down()
    {
        Schema::drop('type_vehicles');
    }
}
