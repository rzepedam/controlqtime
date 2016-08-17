<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDayTripsTable extends Migration
{
    public function up()
    {
        Schema::create('day_trips', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name', 50);
        });
    }

    public function down()
    {
        Schema::drop('day_trips');
    }
}
