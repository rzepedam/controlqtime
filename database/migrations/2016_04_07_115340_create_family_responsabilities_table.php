<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyResponsabilitiesTable extends Migration
{
    public function up()
    {
        Schema::create('family_responsabilities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->string('name_responsability', 120);
            $table->string('rut_responsability', 15);
            $table->integer('relationship_id')->unsigned();
            $table->timestamps();

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('relationship_id')
                ->references('id')
                ->on('relationships')
                ->onUpdate('cascade');

        });
    }
    
    public function down()
    {
        Schema::drop('family_responsabilities');
    }
}
