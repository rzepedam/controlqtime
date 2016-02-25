<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{

    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('area_id')->unsigned();

            $table->foreign('area_id')
            ->references('id')
            ->on('areas')
            ->onUpdate('cascade');

        });
    }


    public function down()
    {
        Schema::drop('companies');
    }
}
