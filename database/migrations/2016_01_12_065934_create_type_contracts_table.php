<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTypeContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('name', ['Plazo Fijo', 'Indefinido']);
            $table->tinyInteger('dur')->nullable();
            $table->string('full_name', 20)->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('type_contracts');
    }
}
