<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageDiseaseEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('image_disease_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('disease_id')->unsigned();
            $table->string('path');
            $table->string('orig_name');
            $table->string('size', 7);
            $table->timestamps();

            $table->foreign('disease_id')
                ->references('id')
                ->on('diseases')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
        });
    }

    public function down()
    {
        Schema::drop('image_disease_employees');
    }
}
