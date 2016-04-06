<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeCertificationsTable extends Migration
{

    public function up()
    {
        Schema::create('type_certifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
        });
    }


    public function down()
    {
        Schema::drop('type_certifications');
    }
}
