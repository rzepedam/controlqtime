<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeProfessionalLicensesTable extends Migration
{

    public function up()
    {
        Schema::create('type_professional_licenses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
        }); 
    }


    public function down()
    {
        Schema::drop('type_professional_licenses');
    }
}
