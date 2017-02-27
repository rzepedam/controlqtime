<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CheckVehicleFormStatePieceVehicle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_vehicle_form_state_piece_vehicle', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('check_vehicle_form_id')->nullable();
            $table->unsignedInteger('piece_vehicle_id')->nullable();
            $table->unsignedInteger('state_piece_vehicle_id')->nullable();
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
        Schema::dropIfExists('check_vehicle_form_state_piece_vehicle');
    }
}
