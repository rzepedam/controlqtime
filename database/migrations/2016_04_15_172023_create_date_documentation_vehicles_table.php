<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDateDocumentationVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date_documentation_vehicles', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('vehicle_id')->nullable();
			$table->date('emission_padron');
			$table->date('expiration_padron');
			$table->date('emission_insurance');
			$table->date('expiration_insurance');
			$table->date('emission_permission');
			$table->date('expiration_permission');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('date_documentation_vehicles');
    }
}
