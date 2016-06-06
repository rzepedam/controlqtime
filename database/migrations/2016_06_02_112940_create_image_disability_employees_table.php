<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageDisabilityEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('image_disability_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('disability_id')->unsigned();
            $table->string('path');
            $table->string('orig_name');
            $table->string('size', 7);
            $table->timestamps();
            
            $table->foreign('disability_id')
                ->references('id')
                ->on('disabilities')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

   public function down()
    {
        Schema::drop('image_disability_employees');
    }
}
