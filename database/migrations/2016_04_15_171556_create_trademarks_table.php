<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrademarksTable extends Migration
{

    public function up()
    {
        Schema::create('trademarks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
        });
    }


    public function down()
    {
        Schema::drop('trademarks');
    }
}
