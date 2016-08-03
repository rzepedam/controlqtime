<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessControlsTable extends Migration
{
    public function up()
    {
        Schema::create('access_controls', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid');
            $table->string('rut', 10);
            $table->string('num_device');
            $table->boolean('status')->default(0);
			$table->timestamp('created_at');
        });
    }

    public function down()
    {
        Schema::drop('access_controls');
    }
}
