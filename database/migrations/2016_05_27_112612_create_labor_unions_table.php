<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaborUnionsTable extends Migration
{
    public function up()
    {
        Schema::create('labor_unions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('labor_unions');
    }
}
