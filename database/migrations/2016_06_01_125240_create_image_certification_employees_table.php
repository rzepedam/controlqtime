<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageCertificationEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('image_certification_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('certification_id')->unsigned();
            $table->string('path');
            $table->string('orig_name');
            $table->string('size', 7);
            $table->timestamps();

            $table->foreign('certification_id')
                ->references('id')
                ->on('certifications')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::drop('image_certification_employees');
    }
}
