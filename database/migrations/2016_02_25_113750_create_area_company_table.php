<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaCompanyTable extends Migration
{
	public function up()
	{
		Schema::create('area_company', function (Blueprint $table) {
			$table->increments('id');
        	$table->integer('area_id')->unsigned();
        	$table->integer('company_id')->unsigned();

        	$table->foreign('area_id')
        		->references('id')
        		->on('areas')
        		->onUpdate('cascade');

    		$table->foreign('company_id')
    			->references('id')
    			->on('companies')
    			->onUpdate('cascade');

	    });
	}

	public function down()
	{
		Schema::drop('area_company');
	}
}
