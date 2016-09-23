<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEngineCubicsTable extends Migration
{
    public function up()
    {
        Schema::create('engine_cubics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('acr', 5);
        });
    }

    public function down()
    {
        Schema::drop('engine_cubics');
    }
}
