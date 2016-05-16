<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagePatentVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('image_patent_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_id')->unsigned();
            $table->string('name');
            $table->string('mime', 20);
            $table->string('orig_name');
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
        Schema::drop('image_patent_vehicles');
    }
}
