<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckVehicleFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_vehicle_forms', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger('master_form_piece_vehicle_id');
	        $table->unsignedInteger('vehicle_id');
            $table->timestamps();
	        
	        $table->foreign('master_form_piece_vehicle_id')
	            ->references('id')
		        ->on('master_form_piece_vehicles')
		        ->onUpdate('cascade');
	        
	        $table->foreign('vehicle_id')
		        ->references('id')
		        ->on('vehicles')
	            ->onUpdate('cascade')
		        ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_vehicle_forms');
    }
}
