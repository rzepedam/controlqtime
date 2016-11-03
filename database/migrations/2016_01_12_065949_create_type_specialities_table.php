<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeSpecialitiesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('type_specialities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
	        $table->softDeletes();
        });
    }
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
    public function down()
    {
        Schema::drop('type_specialities');
    }
}
