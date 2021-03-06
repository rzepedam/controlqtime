<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailAddressLegalEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_address_legal_employees', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('address_id')->nullable();
            $table->string('depto', 5)->nullable();
            $table->string('block', 5)->nullable();
            $table->string('num_home', 5)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_address_legal_employees');
    }
}
