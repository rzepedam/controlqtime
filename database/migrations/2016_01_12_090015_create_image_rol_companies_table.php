<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImageRolCompaniesTable extends Migration
{
    public function up()
    {
        Schema::create('image_rol_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->string('name');
            $table->string('mime', 20);
            $table->string('orig_name');
            $table->timestamps();

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
    }
    
    public function down()
    {
        Schema::drop('image_rol_companies');
    }
}
