<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_buses', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger('detail_vehicle_id')->nullable();
            $table->string('carr', 20);
	        $table->string('num_plazas', 3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_buses');
    }
}
