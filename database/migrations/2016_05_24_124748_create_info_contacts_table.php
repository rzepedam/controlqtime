<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoContactsTable extends Migration
{
    public function up()
    {
        Schema::create('info_contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->string('name_contact', 120);
            $table->string('email_contact', 60)->unique();
            $table->string('address_contact');
            $table->string('tel_contact', 20);
            $table->timestamps();

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::drop('info_contacts');
    }
}
