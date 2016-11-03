<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactEmployeesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('contact_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->unsignedInteger('contact_relationship_id')->nullable();
            $table->string('name_contact', 120);
            $table->string('email_contact', 60)->unique();
            $table->string('address_contact', 100);
            $table->string('tel_contact', 20);
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
        Schema::drop('contact_employees');
    }
}
