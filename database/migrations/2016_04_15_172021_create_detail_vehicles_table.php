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
			$table->unsignedInteger('vehicle_id');
			$table->string('color', 30);
			$table->unsignedInteger('fuel_id');
			$table->string('num_chasis', 17);
			$table->string('num_motor', 12);
			$table->string('km', 7);
			$table->string('engine_cubic', 4);
			$table->string('weight', 6);
			$table->text('obs');

			$table->foreign('vehicle_id')
				->references('id')
				->on('vehicles')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->foreign('fuel_id')
				->references('id')
				->on('fuels')
				->onUpdate('cascade');

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
