<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicensesTable extends Migration
{

    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('expiration')->unsigned();
            $table->string('detail');
        });
    }


    public function down()
    {
        Schema::drop('licenses');
    }
}
