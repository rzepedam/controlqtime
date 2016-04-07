<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyResponsabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_responsabilities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('manpower_id')->unsigned();
            $table->string('name_responsability', 120);
            $table->string('rut', 15);
            $table->integer('relationship_id')->unsigned();
            $table->timestamps();

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
        Schema::drop('family_responsabilities');
    }
}
