<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeContractsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
    public function up()
    {
        Schema::create('type_contracts', function (Blueprint $table) {
            $table->increments('id');
	        $table->enum('name', ['Plazo Fijo', 'Indefinido']);
	        $table->tinyInteger('dur')->default(0);
	        $table->string('full_name', 20);
	        $table->softDeletes();
        });
    }
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
    public function down()
    {
        Schema::drop('type_contracts');
    }
}
