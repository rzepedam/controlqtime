<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDegreesTable extends Migration
{

    public function up()
    {
        Schema::create('degrees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
        });
    }


    public function down()
    {
        Schema::drop('degrees');
    }
}
