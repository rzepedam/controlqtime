<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropAddressColumnsCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('companies', function (Blueprint $table) {
		    $table->dropForeign(['commune_id']);
		    $table->dropColumn(['address', 'commune_id', 'lot', 'bod', 'ofi', 'floor']);
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
