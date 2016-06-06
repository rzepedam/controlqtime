<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageExamEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('image_exam_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exam_id')->unsigned();
            $table->string('path');
            $table->string('orig_name');
            $table->string('size', 7);
            $table->timestamps();

            $table->foreign('exam_id')
                ->references('id')
                ->on('exams')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::drop('image_exam_employees');
    }
}
