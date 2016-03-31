<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManpowerRelationshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manpower_relationships', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manpower_id')->unsigned();
            $table->integer('relationship_id')->unsigned();

            $table->foreign('manpower_id')
                ->references('id')
                ->on('manpowers')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('relationship_id')
                ->references('id')
                ->on('relationships')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('manpower_relationships');
    }
}
