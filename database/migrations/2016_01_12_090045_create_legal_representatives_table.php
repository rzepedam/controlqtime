<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegalRepresentativesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('legal_representatives', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('company_id')->nullable();
	        $table->unsignedInteger('nationality_id')->nullable();
	        $table->string('male_surname', 30);
	        $table->string('female_surname', 30);
	        $table->string('first_name', 30);
	        $table->string('second_name', 30);
	        $table->string('rut_representative', 10);
	        $table->date('birthday');
            $table->string('email_representative', 60)->unique();
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
        Schema::drop('legal_representatives');
    }
}
