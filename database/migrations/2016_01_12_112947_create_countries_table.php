<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{

    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->string('id', 5);
            $table->string('name', 50);
        });
    }

    public function down()
    {
        Schema::drop('countries');
    }
}
