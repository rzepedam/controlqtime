<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeInstitutionsTable extends Migration
{

    public function up()
    {
        Schema::create('type_institutions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
        });
    }


    public function down()
    {
        Schema::drop('type_institutions');
    }
}
