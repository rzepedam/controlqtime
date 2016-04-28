<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{

    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('terminal_id')->unsigned();
            $table->string('name', 50);

            $table->foreign('terminal_id')
                ->references('id')
                ->on('terminals')
                ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::drop('areas');
    }
}
