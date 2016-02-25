<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePensionsTable extends Migration
{

    public function up()
    {
        Schema::create('pensions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 75);
        });
    }


    public function down()
    {
        Schema::drop('pensions');
    }
}
