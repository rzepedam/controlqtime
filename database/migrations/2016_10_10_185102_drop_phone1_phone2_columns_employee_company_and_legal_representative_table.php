<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropPhone1Phone2ColumnsEmployeeCompanyAndLegalRepresentativeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('employees', function (Blueprint $table) {
	        $table->dropColumn(['phone1', 'phone2']);
	    });
	
	    Schema::table('companies', function (Blueprint $table) {
		    $table->dropColumn(['phone1', 'phone2']);
	    });
	
	    Schema::table('legal_representatives', function (Blueprint $table) {
		    $table->dropColumn(['phone1_representative', 'phone2_representative']);
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
		    $table->string('phone1', 20);
		    $table->string('phone2', 20);
	    });
	
	    Schema::table('companies', function (Blueprint $table) {
		    $table->string('phone1', 20);
		    $table->string('phone2', 20);
	    });
	
	    Schema::table('legal_representatives', function (Blueprint $table) {
		    $table->string('phone1_representative', 20);
		    $table->string('phone2_representative', 20);
	    });
    }
}
