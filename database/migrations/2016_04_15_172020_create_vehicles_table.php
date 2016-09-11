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
            $table->integer('state_vehicle_id')->unsigned();
            $table->date('acquisition_date');
            $table->date('inscription_date');
			$table->string('year', 4);
			$table->string('patent', 15)->unique();
			$table->string('code', 50);
			$table->enum('state', ['enable', 'disable'])->default('disable');
            $table->enum('condition', ['available', 'unavailable'])->default('available');
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
            
            $table->foreign('state_vehicle_id')
                ->references('id')
                ->on('state_vehicles')
                ->onUpdate('cascade');

        });
    }


    public function down()
    {
        Schema::drop('vehicles');
    }
}
