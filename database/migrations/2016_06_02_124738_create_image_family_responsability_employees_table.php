<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageFamilyResponsabilityEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('image_family_responsability_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('family_responsability_id')->unsigned();
            $table->string('path');
            $table->string('orig_name');
            $table->string('size', 7);
            $table->timestamps();

            $table->foreign('family_responsability_id', 'image_family_resp_employee_family_resp_foreign')
                ->references('id')
                ->on('family_responsabilities')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::drop('image_family_responsability_employees');
    }
}
