<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageProfessionalLicenseEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('image_professional_license_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('professional_license_id')->unsigned();
            $table->string('path');
            $table->string('orig_name');
            $table->string('size', 7);
            $table->timestamps();

            $table->foreign('professional_license_id', 'image_license_employee_professional_license_foreign')
                ->references('id')
                ->on('professional_licenses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::drop('image_professional_license_employees');
    }
}
