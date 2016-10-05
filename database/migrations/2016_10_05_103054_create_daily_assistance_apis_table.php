<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyAssistanceApisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_assistance_apis', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('rut', 10);
	        $table->string('num_device');
	        $table->boolean('status')->default(0);
	        $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_assistance_apis');
    }
}
