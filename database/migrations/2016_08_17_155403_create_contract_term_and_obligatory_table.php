<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->unsignedInteger('contract_id')->nullable();
            $table->unsignedInteger('term_and_obligatory_id')->nullable();
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
        Schema::drop('contract_term_and_obligatory');
    }
}
