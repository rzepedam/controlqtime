<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageObligatoryInsuranceVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('image_obligatory_insurance_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_id')->unsigned();
            $table->string('path');
            $table->string('orig_name');
            $table->string('size', 7);
            $table->timestamps();

            $table->foreign('vehicle_id')
                ->references('id')
                ->on('vehicles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::drop('image_obligatory_insurance_vehicles');
    }
}
