<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerminalsTable extends Migration
{

    public function up()
    {
        Schema::create('terminals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
			$table->string('address');
			$table->unsignedInteger('commune_id');
            $table->timestamps();

			$table->foreign('commune_id')
				->references('id')
				->on('communes')
				->onUpdate('cascade');
        });
    }

    
    public function down()
    {
        Schema::drop('terminals');
    }
}
