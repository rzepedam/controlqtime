<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
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
            $table->string('depto', 5);
            $table->string('block', 4);
            $table->string('num_home', 5);
            $table->integer('commune_id')->unsigned();
            $table->string('email_employee', 60)->unique();
            $table->string('phone1', 20);
            $table->string('phone2', 20);
            $table->integer('company_id')->unsigned();
            $table->string('code');
            $table->enum('state', ['enable', 'disable'])->default('disable');
            $table->enum('condition', ['available', 'unavailable'])->default('unavailable');

            $table->timestamps();

            $table->foreign('nationality_id')
                ->references('id')
                ->on('nationalities')
                ->onUpdate('cascade');

            $table->foreign('gender_id')
                ->references('id')
                ->on('genders')
                ->onUpdate('cascade');

            $table->foreign('commune_id')
                ->references('id')
                ->on('communes')
                ->onUpdate('cascade');

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }


    public function down()
    {
        Schema::drop('employees');
    }
}
