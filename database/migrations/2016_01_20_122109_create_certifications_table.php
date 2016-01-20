<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificationsTable extends Migration
{

    public function up()
    {
        Schema::create('certifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->integer('institution_id')->unsigned();

            $table->foreign('institution_id')
                ->references('id')
                ->on('institutions')
                ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::drop('certifications');
    }
}
