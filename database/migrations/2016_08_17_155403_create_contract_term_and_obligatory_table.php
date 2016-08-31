<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractTermAndObligatoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_term_and_obligatory', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger('contract_id');
			$table->unsignedInteger('term_and_obligatory_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contract_term_and_obligatory');
    }
}