<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNumHoursTable extends Migration
{
    public function up()
    {
        Schema::create('num_hours', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name', 3);
        });
    }


    public function down()
    {
        Schema::drop('num_hours');
    }
}
