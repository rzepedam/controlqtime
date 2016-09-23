<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForecastsTable extends Migration
{

    public function up()
    {
        Schema::create('forecasts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
        });
    }


    public function down()
    {
        Schema::drop('forecasts');
    }
}
