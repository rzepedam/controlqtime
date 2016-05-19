<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialitiesTable extends Migration
{
    public function up()
    {
        Schema::create('specialities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->integer('type_speciality_id')->unsigned();
            $table->date('emission_speciality');
            $table->date('expired_speciality');
            $table->integer('institution_speciality_id')->unsigned();
            $table->timestamps();
            
            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->foreign('type_speciality_id')
                ->references('id')
                ->on('type_specialities')
                ->onUpdate('cascade');
            
            $table->foreign('institution_speciality_id')
                ->references('id')
                ->on('institutions')
                ->onUpdate('cascade');
        });
    }
    
    public function down()
    {
        Schema::drop('specialities');
    }
}
