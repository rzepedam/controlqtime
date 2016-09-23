<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{

    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 5);
            $table->integer('terminal_id')->unsigned();
            $table->timestamps();

            $table->foreign('terminal_id')
                ->references('id')
                ->on('terminals')
                ->onUpdate('cascade');

        });
    }


    public function down()
    {
        Schema::drop('routes');
    }
}
