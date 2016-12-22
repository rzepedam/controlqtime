<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_vehicles', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('vehicle_id')->nullable();
	        $table->unsignedInteger('fuel_id')->nullable();
	        $table->string('color', 30);
			$table->string('num_chasis', 17);
			$table->string('num_motor', 12);
			$table->string('km', 7);
			$table->string('engine_cubic', 4);
			$table->string('weight', 6);
	        $table->string('tag', 25);
			$table->text('obs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_vehicles');
    }
}
