<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerminalsTable extends Migration
{

    public function up()
    {
        Schema::create('terminals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 75);
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::drop('terminals');
    }
}