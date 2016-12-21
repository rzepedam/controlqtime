<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyResponsabilitiesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('family_responsabilities', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger('employee_id')->nullable();
	        $table->unsignedInteger('relationship_id')->nullable();
	        $table->string('name_responsability', 120);
	        $table->string('rut_responsability', 15);
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
        Schema::drop('family_responsabilities');
    }
}
