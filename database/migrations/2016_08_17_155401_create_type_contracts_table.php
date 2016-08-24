<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeContractsTable extends Migration
{
    public function up()
    {
        Schema::create('type_contracts', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name', 30);
        });
    }

    public function down()
    {
        Schema::drop('type_contracts');
    }
}
