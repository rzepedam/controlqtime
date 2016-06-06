<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageSpecialityEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('image_speciality_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('speciality_id')->unsigned();
            $table->string('path');
            $table->string('orig_name');
            $table->string('size', 7);
            $table->timestamps();

            $table->foreign('speciality_id')
                ->references('id')
                ->on('specialities')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::drop('image_speciality_employees');
    }
}
