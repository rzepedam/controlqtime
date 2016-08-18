<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('company_id');
			$table->unsignedInteger('employee_id');
			$table->unsignedInteger('position_id');
			$table->unsignedInteger('num_hour_id');
			$table->unsignedInteger('periodicity_hour_id');
			$table->unsignedInteger('day_trip_id');
			$table->unsignedInteger('periodicity_work_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('contracts');
    }

}
