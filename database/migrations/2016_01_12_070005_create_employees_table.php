<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger('nationality_id')->nullable();
	        $table->unsignedInteger('marital_status_id')->nullable();
	        $table->unsignedInteger('forecast_id')->nullable();
	        $table->unsignedInteger('pension_id')->nullable();
	        $table->string('male_surname', 30);
	        $table->string('female_surname', 30);
	        $table->string('first_name', 30);
	        $table->string('second_name', 30);
	        $table->string('full_name', 120);
	        $table->string('rut', 10)->unique();
	        $table->date('birthday');
	        $table->boolean('is_male')->default(false);
			$table->string('email_employee', 60)->unique();
			$table->string('url')->nullable();
            $table->enum('state', ['enable', 'disable'])->default('disable');
            $table->enum('condition', ['available', 'unavailable'])->default('unavailable');
	        $table->softDeletes();
	        $table->timestamps();
        });
    }
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
    public function down()
    {
        Schema::drop('employees');
    }
}
