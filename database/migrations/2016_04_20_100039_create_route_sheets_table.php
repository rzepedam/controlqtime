<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouteSheetsTable extends Migration
{

    public function up()
    {
        Schema::create('route_sheets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_sheet', 20);
            $table->integer('manpower_id')->unsigned();
            $table->string('turn', 2);
            $table->text('obs');
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->timestamps();

            $table->foreign('manpower_id')
                ->references('id')
                ->on('manpowers')
                ->onUpdate('cascade');

        });
    }


    public function down()
    {
        Schema::drop('route_sheets');
    }
}
