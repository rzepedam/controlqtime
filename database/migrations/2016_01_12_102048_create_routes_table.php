<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger('terminal_id')->nullable();
	        $table->string('name', 5);
	        $table->softDeletes();
            $table->timestamps();
        });
    }
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
    public function down()
    {
        Schema::drop('routes');
    }
}
