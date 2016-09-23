<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('contact_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->integer('contact_relationship_id')->unsigned();
            $table->string('name_contact', 120);
            $table->string('email_contact', 60)->unique();
            $table->string('address_contact', 100);
            $table->string('tel_contact', 20);
            $table->timestamps();

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('contact_relationship_id')
                ->references('id')
                ->on('relationships')
                ->onUpdate('cascade');

        });
    }

    public function down()
    {
        Schema::drop('contact_employees');
    }
}
