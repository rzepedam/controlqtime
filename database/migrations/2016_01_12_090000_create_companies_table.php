<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{

    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rut', 15);
            $table->string('firm_name');
            $table->string('gyre');
            $table->integer('start_act')->unsigned();
            $table->string('muni_license');
            $table->string('address');
            $table->integer('commune_id')->unsigned();
            $table->string('num', 10);
            $table->string('lot', 25);
            $table->string('ofi', 5);
            $table->string('floor', 3);
            $table->string('email', 100)->unique();
            $table->string('phone1', 20);
            $table->string('phone2', 20);

            $table->foreign('commune_id')
                ->references('id')
                ->on('communes')
                ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::drop('companies');
    }
}
