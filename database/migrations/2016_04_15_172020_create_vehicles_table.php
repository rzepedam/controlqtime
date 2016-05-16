<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('model_vehicle_id')->unsigned();
            $table->integer('type_vehicle_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->string('year', 4);
            $table->string('color', 30);
            $table->string('patent', 15)->unique();
            $table->integer('fuel_id')->unsigned();
            $table->string('num_motor', 12);
            $table->string('num_chasis', 17);   
            $table->string('km', 7);
            $table->string('engine_cubic', 4);
            $table->string('weight', 6);
            $table->string('code');
            $table->text('obs');
            $table->enum('state', ['available', 'unavailable'])->default('unavailable');
            $table->enum('condition', ['able', 'unable'])->default('unable');
            $table->timestamps();

            $table->foreign('model_vehicle_id')
                ->references('id')
                ->on('model_vehicles')
                ->onUpdate('cascade');

            $table->foreign('type_vehicle_id')
                ->references('id')
                ->on('type_vehicles')
                ->onUpdate('cascade');

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade');

            $table->foreign('fuel_id')
                ->references('id')
                ->on('fuels')
                ->onUpdate('cascade');

        });
    }


    public function down()
    {
        Schema::drop('vehicles');
    }
}
