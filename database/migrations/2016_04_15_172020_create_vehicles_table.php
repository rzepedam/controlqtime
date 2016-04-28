<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{

    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_vehicle_id')->unsigned();
            $table->integer('model_vehicle_id')->unsigned();
            $table->integer('terminal_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->string('patent', 15)->unique();
            $table->string('year', 4);
            $table->string('code');
            $table->enum('status', ['available', 'unavailable'])->default('available');
            $table->timestamps();

            $table->foreign('type_vehicle_id')
                ->references('id')
                ->on('type_vehicles')
                ->onUpdate('cascade');

            $table->foreign('model_vehicle_id')
                ->references('id')
                ->on('model_vehicles')
                ->onUpdate('cascade');

            $table->foreign('terminal_id')
                ->references('id')
                ->on('terminals')
                ->onUpdate('cascade');

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade');

        });
    }


    public function down()
    {
        Schema::drop('vehicles');
    }
}
