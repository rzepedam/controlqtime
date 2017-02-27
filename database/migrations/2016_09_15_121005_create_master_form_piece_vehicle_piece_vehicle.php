<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterFormPieceVehiclePieceVehicle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_form_piece_vehicle_piece_vehicle', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('master_form_piece_vehicle_id')->nullable();
            $table->unsignedInteger('piece_vehicle_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_form_piece_vehicle_piece_vehicle');
    }
}
