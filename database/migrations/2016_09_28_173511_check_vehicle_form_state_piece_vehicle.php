<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
	        $table->unsignedInteger('check_vehicle_form_id');
	        $table->unsignedInteger('state_piece_vehicle_id');
            
	        $table->foreign('check_vehicle_form_id', 'check_form')
		        ->references('id')
		        ->on('check_vehicle_forms')
		        ->onUpdate('cascade');
	        
	        $table->foreign('state_piece_vehicle_id', 'state_piece')
		        ->references('id')
		        ->on('state_piece_vehicles')
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
        Schema::dropIfExists('check_vehicle_form_state_piece_vehicle');
    }
}
