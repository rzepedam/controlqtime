<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeSpecialitiesTable extends Migration
{

    public function up()
    {
        Schema::create('type_specialities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
        });
    }


    public function down()
    {
        Schema::drop('type_specialities');
    }
}
