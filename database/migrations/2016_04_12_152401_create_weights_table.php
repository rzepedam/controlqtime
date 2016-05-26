<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeightsTable extends Migration
{
    public function up()
    {
        Schema::create('weights', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('acr', 5);
        });
    }

    public function down()
    {
        Schema::drop('weights');
    }
}
