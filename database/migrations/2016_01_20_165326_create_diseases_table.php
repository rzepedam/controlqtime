<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiseasesTable extends Migration
{

    public function up()
    {
        Schema::create('diseases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->text('description');
        });
    }


    public function down()
    {
        Schema::drop('diseases');
    }
}
