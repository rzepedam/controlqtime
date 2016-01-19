<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKinsTable extends Migration
{

    public function up()
    {
        Schema::create('kins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
        });
    }


    public function down()
    {
        Schema::drop('kins');
    }
}
