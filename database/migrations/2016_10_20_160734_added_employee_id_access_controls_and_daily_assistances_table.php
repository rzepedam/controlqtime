<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddedEmployeeIdAccessControlsAndDailyAssistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('access_control_apis', function(Blueprint $table)
        {
            $table->unsignedInteger('employee_id');
	        
	        $table->foreign('employee_id')
		        ->references('id')
		        ->on('employees')
		        ->onUpdate('cascade')
		        ->onDelete('cascade');
        });
	
	    Schema::table('daily_assistance_apis', function(Blueprint $table)
	    {
		    $table->unsignedInteger('employee_id');
		
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
	    Schema::table('access_control_apis', function(Blueprint $table)
	    {
		    $table->dropForeign(['employee_id']);
		    $table->dropColumn(['employee_id']);
	    });
	
	    Schema::table('daily_assistance_apis', function(Blueprint $table)
	    {
		    $table->dropForeign(['employee_id']);
		    $table->dropColumn(['employee_id']);
	    });
    }
}
