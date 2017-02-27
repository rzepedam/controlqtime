<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiseasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diseases', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('employee_id')->nullable();
            $table->unsignedInteger('type_disease_id')->nullable();
            $table->boolean('treatment_disease')->default(false);
            $table->text('detail_disease');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('diseases');
    }
}
