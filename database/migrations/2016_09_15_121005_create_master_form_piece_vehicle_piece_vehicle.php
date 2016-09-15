<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
	        $table->unsignedInteger('master_form_piece_vehicle_id');
	        $table->unsignedInteger('piece_vehicle_id');
	        
	        $table->foreign('master_form_piece_vehicle_id', 'master_form')
		        ->references('id')
		        ->on('master_form_piece_vehicles')
		        ->onUpdate('cascade');
	        
	        $table->foreign('piece_vehicle_id', 'piece_vehicle')
	              ->references('id')
	              ->on('piece_vehicles')
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
        Schema::dropIfExists('master_form_piece_vehicle_piece_vehicle');
    }
}
