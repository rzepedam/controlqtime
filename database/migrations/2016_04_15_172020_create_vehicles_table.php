<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('model_vehicle_id')->nullable();
            $table->unsignedInteger('type_vehicle_id')->nullable();
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('state_vehicle_id')->nullable();
            $table->date('acquisition_date');
            $table->date('inscription_date');
            $table->string('year', 4);
            $table->string('patent', 6)->unique()->index();
            $table->string('code', 20);
            $table->enum('state', ['enable', 'disable'])->default('disable');
            $table->enum('condition', ['available', 'unavailable'])->default('available');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vehicles');
    }
}
