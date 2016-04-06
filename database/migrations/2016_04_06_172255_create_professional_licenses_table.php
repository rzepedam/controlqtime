<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professional_licenses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manpower_id')->unsigned();
            $table->integer('type_professional_license_id')->unsigned();
            $table->date('expired_license');
            $table->string('detail_license');
            $table->timestamps();

            $table->foreign('manpower_id')
                ->references('id')
                ->on('manpowers')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('type_professional_license_id')
                ->references('id')
                ->on('type_professional_licenses')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('professional_licenses');
    }
}
