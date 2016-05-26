<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('state_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 6);
        });
    }
    
    public function down()
    {
        Schema::drop('state_vehicles');
    }
}
