<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagePatentCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('image_patent_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->string('name');
            $table->string('mime', 20);
            $table->string('orig_name');
            $table->timestamps();

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::drop('image_patent_companies');
    }
}
