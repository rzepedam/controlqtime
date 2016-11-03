<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger('employee_id')->nullable();
	        $table->unsignedInteger('company_id')->nullable();
			$table->unsignedInteger('position_id')->nullable();
			$table->unsignedInteger('area_id')->nullable();
			$table->unsignedInteger('num_hour_id')->nullable();
			$table->unsignedInteger('periodicity_hour_id')->nullable();
			$table->unsignedInteger('day_trip_id')->nullable();
	        $table->unsignedInteger('periodicity_work_id')->nullable();
	        $table->unsignedInteger('gratification_id')->nullable();
	        $table->unsignedInteger('type_contract_id')->nullable();
	        $table->string('init_morning', 5);
	        $table->string('end_morning', 5);
	        $table->string('init_afternoon', 5);
	        $table->string('end_afternoon', 5);
	        $table->string('salary', 8);
	        $table->string('mobilization', 8);
	        $table->string('collation', 8);
	        $table->timestamp('expires_at')->default(null);
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
        Schema::drop('contracts');
    }

}
