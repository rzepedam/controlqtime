<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodicitiesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('periodicities', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name', 15);
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
        Schema::drop('periodicities');
    }
}
