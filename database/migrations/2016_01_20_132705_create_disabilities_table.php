<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisabilitiesTable extends Migration
{

    public function up()
    {
        Schema::create('disabilities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->text('description');
        });
    }


    public function down()
    {
        Schema::drop('disabilities');
    }
}
