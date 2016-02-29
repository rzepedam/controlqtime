<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvincesTable extends Migration
{

    public function up()
    {
        Schema::create('provinces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('region_id')->unsigned();

            $table->foreign('region_id')
                ->references('id')
                ->on('regions')
                ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::drop('provinces');
    }
}
