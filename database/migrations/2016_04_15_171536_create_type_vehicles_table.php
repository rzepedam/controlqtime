<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeVehiclesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('type_vehicles', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger('engine_cubic_id')->nullable();
	        $table->unsignedInteger('weight_id')->nullable();
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
        Schema::drop('type_vehicles');
    }
}
