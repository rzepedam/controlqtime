<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('type_company_id')->nullable();
	        $table->string('rut', 11);
	        $table->string('firm_name', 75);
	        $table->string('gyre', 100);
	        $table->date('start_act');
	        $table->string('muni_license', 25);
            $table->string('email_company', 60)->unique();
            $table->enum('state', ['enable', 'disable'])->default('disable');
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
        Schema::drop('companies');
    }
}