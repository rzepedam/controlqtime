<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyAssistancesTable extends Migration
{

    public function up()
    {
        Schema::create('daily_assistances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manpower_id')->unsigned();
            $table->timestamps();

            $table->foreign('manpower_id')
                ->references('id')
                ->on('manpowers')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }


    public function down()
    {
        Schema::drop('daily_assistances');
    }
}
