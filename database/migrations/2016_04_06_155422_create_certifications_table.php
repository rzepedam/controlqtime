<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certifications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->integer('type_certification_id')->unsigned();
            $table->integer('institution_certification_id')->unsigned();
            $table->date('emission_certification');
            $table->date('expired_certification');
            $table->timestamps();

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('type_certification_id')
                ->references('id')
                ->on('type_certifications')
                ->onUpdate('cascade');

            $table->foreign('institution_certification_id')
                ->references('id')
                ->on('institutions')
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
        Schema::drop('certifications');
    }
}
