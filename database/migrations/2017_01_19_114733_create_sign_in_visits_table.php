<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignInVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sign_in_visits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('male_surname', 30);
            $table->string('female_surname', 30);
            $table->string('first_name', 30);
            $table->string('second_name', 30);
            $table->string('full_name', 120);
            $table->string('rut', 10)->unique();
            $table->date('birthday');
            $table->boolean('is_male')->default(false);
            $table->string('phone', 12);
            $table->string('email', 60)->unique();
            $table->enum('state', ['enable', 'disable'])->default('disable');
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
        Schema::dropIfExists('sign_in_visits');
    }
}
