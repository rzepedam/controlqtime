<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunesTable extends Migration
{

    public function up()
    {
        Schema::create('communes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('province_id')->unsigned();

            $table->foreign('province_id')
                ->references('id')
                ->on('provinces')
                ->onUpdate('cascade');

        });
    }

    public function down()
    {
        Schema::drop('communes');
    }
}
