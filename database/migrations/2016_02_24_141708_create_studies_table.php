<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudiesTable extends Migration
{
    public function up()
    {
        Schema::create('studies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->integer('degree_id')->unsigned();
            $table->string('name_study', 100);
            $table->integer('institution_study_id')->unsigned();
            $table->date('date_obtention');

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('degree_id')
            ->references('id')
            ->on('degrees')
            ->onUpdate('cascade');

            $table->foreign('institution_study_id')
            ->references('id')
            ->on('institutions')
            ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::drop('studies');
    }
}

