<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailCollegeStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_college_studies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('study_id')->nullable();
	        $table->unsignedInteger('institution_study_id')->nullable();
	        $table->string('name_study', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_college_studies');
    }
}
