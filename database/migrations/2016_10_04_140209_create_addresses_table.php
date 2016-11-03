<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger('commune_id')->nullable();
	        $table->unsignedInteger('addressable_id')->nullable();
	        $table->string('addressable_type')->nullable();
	        $table->string('address', 75);
	        $table->string('phone1', 20);
	        $table->string('phone2', 20);
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
        Schema::dropIfExists('addresses');
    }
}
