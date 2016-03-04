<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubsidiariesTable extends Migration
{

    public function up()
    {
        Schema::create('subsidiaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address');
            $table->integer('commune_id')->unsigned();
            $table->string('num', 8);
            $table->string('lot', 20);
            $table->string('ofi', 5);
            $table->string('floor', 3);
            $table->string('muni_license', 50);
            $table->string('email', 100)->unique();
            $table->string('phone1', 20);
            $table->string('phone2', 20);
            $table->timestamps();

            $table->foreign('commune_id')
                ->references('id')
                ->on('communes')
                ->onUpdate('cascade');
        });
    }


    public function down()
    {
        Schema::drop('subsidiaries');
    }
}
