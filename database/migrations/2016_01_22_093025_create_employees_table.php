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
            $table->string('rut', 10);
            $table->date('birthday');
            $table->integer('nationality_id')->unsigned();
            $table->integer('gender_id')->unsigned();
			$table->unsignedInteger('marital_status_id');
            $table->string('address');
            $table->string('depto', 5);
            $table->string('block', 4);
            $table->string('num_home', 5);
            $table->integer('commune_id')->unsigned();
            $table->string('email_employee', 60)->unique();
            $table->string('phone1', 20);
            $table->string('phone2', 20);
			$table->string('url')->default('');
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

			$table->foreign('marital_status_id')
				->references('id')
				->on('marital_statuses')
				->onUpdate('cascade');

            $table->foreign('commune_id')
                ->references('id')
                ->on('communes')
                ->onUpdate('cascade');

        });
    }


    public function down()
    {
        Schema::drop('employees');
    }
}
