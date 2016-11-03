<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrademarksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('trademarks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
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
        Schema::drop('trademarks');
    }
}
