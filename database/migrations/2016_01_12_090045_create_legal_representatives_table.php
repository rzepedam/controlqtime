<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegalRepresentativesTable extends Migration
{

    public function up()
    {
        Schema::create('legal_representatives', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->string('male_surname', 30);
            $table->string('female_surname', 30);
            $table->string('first_name', 30);
            $table->string('second_name', 30);
            $table->string('rut', 15);
            $table->integer('country_id')->unsigned();
            $table->string('email', 100)->unique();
            $table->string('phone1', 20);
            $table->timestamps();

            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onUpdate('cascade');

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::drop('legal_representatives');
    }
}
