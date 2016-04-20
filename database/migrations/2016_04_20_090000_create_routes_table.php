<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{

    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 5);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::drop('routes');
    }
}
