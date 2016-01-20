<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsTable extends Migration
{

    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 80);
            $table->integer('type_institution_id')->unsigned();

            $table->foreign('type_institution_id')
                ->references('id')
                ->on('type_institutions')
                ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::drop('institutions');
    }
}
