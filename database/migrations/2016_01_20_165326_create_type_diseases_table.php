<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeDiseasesTable extends Migration
{

    public function up()
    {
        Schema::create('type_diseases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
        });
    }


    public function down()
    {
        Schema::drop('type_diseases');
    }
}
