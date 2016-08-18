<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGratificationsTable extends Migration
{
    public function up()
    {
        Schema::create('gratifications', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
        });
    }

    public function down()
    {
        Schema::drop('gratifications');
    }
}
