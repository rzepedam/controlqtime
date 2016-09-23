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
			$table->unsignedInteger('area_id');
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
            $table->timestamps();

			$table->foreign('company_id')
				->references('id')
				->on('companies')
				->onUpdate('cascade');

			$table->foreign('employee_id')
				->references('id')
				->on('employees')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->foreign('position_id')
				->references('id')
				->on('positions')
				->onUpdate('cascade');

			$table->foreign('area_id')
				->references('id')
				->on('areas')
				->onUpdate('cascade');

			$table->foreign('num_hour_id')
				->references('id')
				->on('num_hours')
				->onUpdate('cascade');

			$table->foreign('periodicity_hour_id')
				->references('id')
				->on('periodicities')
				->onUpdate('cascade');

			$table->foreign('day_trip_id')
				->references('id')
				->on('day_trips')
				->onUpdate('cascade');

			$table->foreign('periodicity_work_id')
				->references('id')
				->on('periodicities')
				->onUpdate('cascade');

			$table->foreign('gratification_id')
				->references('id')
				->on('gratifications')
				->onUpdate('cascade');

			$table->foreign('type_contract_id')
				->references('id')
				->on('type_contracts')
				->onUpdate('cascade');

        });
    }

    public function down()
    {
        Schema::drop('contracts');
    }

}
