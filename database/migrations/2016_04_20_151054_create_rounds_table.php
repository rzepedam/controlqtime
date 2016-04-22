<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoundsTable extends Migration
{

    public function up()
    {
        Schema::create('rounds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('route_sheet_id')->unsigned();
            $table->integer('route_id')->unsigned();
            $table->integer('vehicle_id')->unsigned();
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->timestamps();

            $table->foreign('route_sheet_id')
                ->references('id')
                ->on('route_sheets')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('route_id')
                ->references('id')
                ->on('routes')
                ->onUpdate('cascade');

            $table->foreign('vehicle_id')
                ->references('id')
                ->on('vehicles')
                ->onUpdate('cascade');

        });
    }


    public function down()
    {
        Schema::drop('rounds');
    }
}
