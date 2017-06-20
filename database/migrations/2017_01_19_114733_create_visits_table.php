<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('type_visit_id')->nullable();
            $table->unsignedInteger('employee_id')->nullable();
            $table->boolean('is_walking')->defaul(false);
            $table->string('male_surname');
            $table->string('female_surname');
            $table->string('first_name');
            $table->string('second_name');
            $table->string('rut');
            $table->string('position');
            $table->string('company');
            $table->string('phone');
            $table->date('date')->nullable();
            $table->string('hour', 4)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('email');
            $table->text('obs');
            $table->string('url')->default(null);
            $table->string('key');
            $table->enum('state', ['pending', 'approved', 'denied'])->nullable();
            $table->timestamps();

            $table->index(['key']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
