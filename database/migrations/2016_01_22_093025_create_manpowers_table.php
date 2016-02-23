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
            $table->string('track');
            $table->string('cod_ref');
            $table->string('qr');
            $table->string('male_surname', 30);
            $table->string('female_surname', 30);
            $table->string('first_name', 30);
            $table->string('second_name', 30);
            $table->string('full_name', 120);
            $table->string('rut', 12);
            $table->integer('birthday')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->integer('gender_id')->unsigned();
            $table->integer('forecast_id')->unsigned();
            $table->integer('mutuality_id')->unsigned();
            $table->integer('pension_id')->unsigned();
            $table->integer('rating_id')->unsigned();
            $table->integer('subarea_id')->unsigned();
            $table->integer('commune_id')->unsigned();
            $table->string('address');
            $table->string('phone1', 20);
            $table->string('phone2', 20);
            $table->string('email', 100)->unique();
            $table->string('name', 120);
            $table->string('phone3', 20);
            $table->timestamps();

            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onUpdate('cascade');

            $table->foreign('gender_id')
                ->references('id')
                ->on('genders')
                ->onUpdate('cascade');

            $table->foreign('mutuality_id')
                ->references('id')
                ->on('mutualities')
                ->onUpdate('cascade');

            $table->foreign('pension_id')
                ->references('id')
                ->on('pensions')
                ->onUpdate('cascade');

            $table->foreign('forecast_id')
                ->references('id')
                ->on('forecasts')
                ->onUpdate('cascade');

            $table->foreign('subarea_id')
                ->references('id')
                ->on('subareas')
                ->onUpdate('cascade');

            $table->foreign('rating_id')
                ->references('id')
                ->on('ratings')
                ->onUpdate('cascade');

            $table->foreign('commune_id')
                ->references('id')
                ->on('communes')
                ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::drop('manpowers');
    }
}
