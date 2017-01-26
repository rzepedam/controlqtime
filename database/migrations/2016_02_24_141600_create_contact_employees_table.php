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
	        $table->unsignedInteger('contactsable_id')->nullable();
	        $table->string('contactsable_type');
            $table->unsignedInteger('contact_relationship_id')->nullable();
            $table->string('name_contact', 120);
	        $table->string('tel_contact', 12);
	        $table->string('email_contact', 60)->unique();
	        $table->string('address_contact', 150);
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
