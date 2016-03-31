<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicensesTable extends Migration
{

    public function up()
    {
        Schema::create('licenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->date('expiration');
            $table->string('detail')->default(null);
        });
    }


    public function down()
    {
        Schema::drop('licenses');
    }
}
