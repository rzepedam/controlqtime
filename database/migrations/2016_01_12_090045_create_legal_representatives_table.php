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
            $table->string('rut_representative', 10);
            $table->date('birthday');
            $table->integer('nationality_id')->unsigned();
            $table->string('phone1_representative', 20);
            $table->string('phone2_representative', 20);
            $table->string('email_representative', 60)->unique();
            $table->timestamps();

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('nationality_id')
                ->references('id')
                ->on('nationalities')
                ->onUpdate('cascade');

        });
    }

    public function down()
    {
        Schema::drop('legal_representatives');
    }
}