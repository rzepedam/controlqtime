<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeExamsTable extends Migration
{

    public function up()
    {
        Schema::create('type_exams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 75);
        });
    }


    public function down()
    {
        Schema::drop('type_exams');
    }
}