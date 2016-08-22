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
			$table->string('init_morning', 5);
			$table->string('end_morning', 5);
			$table->string('init_afternoon', 5);
			$table->string('end_afternoon', 5);
			$table->unsignedInteger('periodicity_work_id');
			$table->string('salary', 8);
			$table->string('mobilization', 8);
			$table->string('collation', 8);
			$table->unsignedInteger('gratification_id');
			$table->unsignedInteger('type_contract_id');
			$table->unsignedInteger('pension_id');
			$table->unsignedInteger('forecast_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('contracts');
    }

}
