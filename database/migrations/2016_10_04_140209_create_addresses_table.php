<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger('employee_id');
	        $table->string('address', 75);
	        $table->string('depto', 5);
	        $table->string('block', 5);
	        $table->string('num_home', 5);
	        $table->unsignedInteger('commune_id');
	
	        $table->foreign('employee_id')
		        ->references('id')
		        ->on('employees')
		        ->onUpdate('cascade');
	        
	        $table->foreign('commune_id')
		        ->references('id')
		        ->on('communes')
		        ->onUpdate('cascade');
	        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
