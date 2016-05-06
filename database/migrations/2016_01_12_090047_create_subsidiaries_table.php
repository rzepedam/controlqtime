<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubsidiariesTable extends Migration
{

    public function up()
    {
        Schema::create('subsidiaries', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->string('address_suc');
            $table->integer('commune_suc_id')->unsigned();
            $table->string('num_suc', 8);
            $table->string('lot_suc', 20);
            $table->string('ofi_suc', 5);
            $table->string('floor_suc', 3);
            $table->string('muni_license_suc', 50);
            $table->string('phone1_suc', 20);
            $table->string('phone2_suc', 20);
            $table->string('email_suc', 100)->unique();
            $table->timestamps();

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('commune_suc_id')
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
