<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodicitiesTable extends Migration
{
    public function up()
    {
        Schema::create('periodicities', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name', 15);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('periodicities');
    }
}
