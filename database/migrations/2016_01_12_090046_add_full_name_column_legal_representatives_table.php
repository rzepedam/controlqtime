<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFullNameColumnLegalRepresentativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('legal_representatives', function (Blueprint $table) {
		    $table->string('full_name', 120);
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('legal_representatives', function (Blueprint $table) {
		    $table->dropColumn('full_name');
	    });
    }
}
