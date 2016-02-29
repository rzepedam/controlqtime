<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{

    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('subsidiary_id')->unsigned();

            $table->foreign('subsidiary_id')
                ->references('id')
                ->on('subsidiaries')
                ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::drop('areas');
    }
}
