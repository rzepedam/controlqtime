<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudiesTable extends Migration
{

    public function up()
    {
        Schema::create('studies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('degree_id')->unsigned();
            $table->string('name', 100);
            $table->integer('institution_id')->unsigned();
            $table->integer('date');

            $table->foreign('degree_id')
            ->references('id')
            ->on('studies')
            ->onUpdate('cascade');

            $table->foreign('institution_id')
            ->references('id')
            ->on('institutions')
            ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::drop('studies');
    }
}

