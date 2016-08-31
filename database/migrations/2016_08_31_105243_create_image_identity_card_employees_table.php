<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageIdentityCardEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_identity_card_employees', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('employee_id');
			$table->string('path');
			$table->string('orig_name');
			$table->string('size', 7);
            $table->timestamps();

			$table->foreign('employee_id')
				->references('id')
				->on('employees')
				->onUpdate('cascade')
				->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('image_identity_card_employees');
    }
}
