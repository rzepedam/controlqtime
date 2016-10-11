<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropDeptoBlockNumHomeAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('addresses', function (Blueprint $table) {
		    $table->dropForeign(['employee_id']);
		    $table->dropColumn(['depto', 'block', 'num_home', 'employee_id']);
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('addresses', function (Blueprint $table)
	    {
		    $table->string('depto', 5);
		    $table->string('block', 5);
		    $table->string('num_home', 5);
	    });
    }
}
