<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailAddressCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_address_companies', function (Blueprint $table) {
            $table->increments('id');
	        $table->unsignedInteger('address_id');
	        $table->string('lot', 5);
	        $table->string('bod', 5);
	        $table->string('ofi', 5);
	        $table->string('floor', 3);
	        
	        $table->foreign('address_id')
		        ->references('id')
		        ->on('addresses')
		        ->onUpdate('cascade')
	            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_address_companies');
    }
}
