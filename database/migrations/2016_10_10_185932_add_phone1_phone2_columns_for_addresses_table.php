<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhone1Phone2ColumnsForAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('addresses', function (Blueprint $table) {
		    $table->unsignedInteger('addressable_id');
		    $table->string('addressable_type');
		    $table->string('phone1', 20);
		    $table->string('phone2', 20);
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('addresses', function (Blueprint $table) {
		    $table->dropColumn(['addressable_id', 'addressable_type', 'phone1', 'phone2']);
	    });
    }
}
