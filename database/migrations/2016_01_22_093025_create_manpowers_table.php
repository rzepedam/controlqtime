<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManpowersTable extends Migration
{

    public function up()
    {
        Schema::create('manpowers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('photo');
            $table->string('male_surname', 30);
            $table->string('female_surname', 30);
            $table->string('first_name', 30);
            $table->string('second_name', 30);
            $table->string('full_name', 120);
            $table->string('rut', 15);
            $table->date('birthday');
            $table->integer('nationality_id')->unsigned();
            $table->integer('gender_id')->unsigned();
            $table->string('address');
            $table->integer('commune_id')->unsigned();
            $table->string('email', 100)->unique();
            $table->string('phone1', 20);
            $table->string('phone2', 20);
            $table->integer('forecast_id')->unsigned();
            $table->integer('mutuality_id')->unsigned();
            $table->integer('pension_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->integer('rating_id')->unsigned();
            $table->integer('area_id')->unsigned();
            $table->string('code_internal');
            $table->enum('status', ['available', 'unavailable'])->default('available');

            $table->timestamps();

            $table->foreign('nationality_id')
                ->references('id')
                ->on('nationalities')
                ->onUpdate('cascade');

            $table->foreign('commune_id')
                ->references('id')
                ->on('communes')
                ->onUpdate('cascade');

            $table->foreign('gender_id')
                ->references('id')
                ->on('genders')
                ->onUpdate('cascade');

            $table->foreign('forecast_id')
                ->references('id')
                ->on('forecasts')
                ->onUpdate('cascade');

            $table->foreign('mutuality_id')
                ->references('id')
                ->on('mutualities')
                ->onUpdate('cascade');

            $table->foreign('pension_id')
                ->references('id')
                ->on('pensions')
                ->onUpdate('cascade');

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('rating_id')
                ->references('id')
                ->on('ratings')
                ->onUpdate('cascade');

            $table->foreign('area_id')
                ->references('id')
                ->on('areas')
                ->onupdate('cascade');

        });
    }


    public function down()
    {
        Schema::drop('manpowers');
    }
}
