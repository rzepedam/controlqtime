<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNameAndDurTypeContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('type_contracts', function (Blueprint $table) {
		    $table->enum('name', ['Plazo Fijo', 'Indefinido']);
		    $table->dropColumn(['type']);
		    $table->tinyInteger('dur')->default(0);
		    $table->string('full_name', 20);
	    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::table('type_contracts', function (Blueprint $table) {
		    $table->dropColumn(['dur']);
	    });
    }
}
