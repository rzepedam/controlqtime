<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{

    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type_company_id')->unsigned();
            $table->string('rut', 15);
            $table->string('firm_name');
            $table->string('gyre');
            $table->date('start_act');
            $table->string('address');
            $table->integer('commune_id')->unsigned();
            $table->string('num', 8);
            $table->string('lot', 20);
            $table->string('bod', 5);
            $table->string('ofi', 5);
            $table->string('floor', 3);
            $table->string('muni_license', 50);
            $table->string('phone1', 20);
            $table->string('phone2', 20);
            $table->string('email_company', 60)->unique();
            $table->enum('state', ['enable', 'disable'])->default('disable');
            $table->timestamps();

            $table->foreign('type_company_id')
                ->references('id')
                ->on('type_companies')
                ->onUpdate('cascade');

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