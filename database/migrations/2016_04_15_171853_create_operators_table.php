<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperatorsTable extends Migration
{

    public function up()
    {
        Schema::create('operators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 75);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('operators');
    }
}
