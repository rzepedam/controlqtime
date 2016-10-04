<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropAddressColumnsEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
	        $table->dropForeign(['commune_id']);
	        $table->dropColumn(['address', 'depto', 'block', 'num_home', 'commune_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
	        $table->string('address', 75);
	        $table->string('depto', 5);
	        $table->string('block', 5);
	        $table->string('num_home', 5);
	        $table->unsignedInteger('commune_id');
	
	        $table->foreign('commune_id')
		        ->references('id')
		        ->on('communes')
		        ->onUpdate('cascade');
	        
        });
    }
}
