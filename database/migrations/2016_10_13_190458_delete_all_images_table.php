<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteAllImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::dropIfExists('image_padron_vehicles');
	    Schema::dropIfExists('image_obligatory_insurance_vehicles');
	    Schema::dropIfExists('image_circulation_permit_vehicles');
	    Schema::dropIfExists('image_certification_employees');
	    Schema::dropIfExists('image_speciality_employees');
	    Schema::dropIfExists('image_professional_license_employees');
	    Schema::dropIfExists('image_disability_employees');
	    Schema::dropIfExists('image_disease_employees');
	    Schema::dropIfExists('image_exam_employees');
		Schema::dropIfExists('image_family_responsability_employees');
	    Schema::dropIfExists('image_identity_card_employees');
	    Schema::dropIfExists('image_criminal_record_employees');
	    Schema::dropIfExists('image_health_certificate_employees');
	    Schema::dropIfExists('image_pension_certificate_employees');
	    Schema::dropIfExists('image_rol_companies');
	    Schema::dropIfExists('image_patent_companies');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	    Schema::create('image_padron_vehicles', function (Blueprint $table) {
		    $table->increments('id');
	    });
	    
	    Schema::create('image_obligatory_insurance_vehicles', function (Blueprint $table) {
	    	$table->increments('id');
	    });
	    Schema::create('image_circulation_permit_vehicles', function (Blueprint $table) {
	    	$table->increments('id');
	    });
	    Schema::create('image_certification_employees', function (Blueprint $table) {
	    	$table->increments('id');
	    });
	    Schema::create('image_speciality_employees', function (Blueprint $table) {
	    	$table->increments('id');
	    });
	    Schema::create('image_professional_license_employees', function (Blueprint $table) {
	    	$table->increments('id');
	    });
	    Schema::create('image_disability_employees', function (Blueprint $table) {
	    	$table->increments('id');
	    });
	    Schema::create('image_disease_employees', function (Blueprint $table) {
	    	$table->increments('id');
	    });
	    Schema::create('image_exam_employees', function (Blueprint $table) {
	    	$table->increments('id');
	    });
	    Schema::create('image_family_responsability_employees', function (Blueprint $table) {
	    	$table->increments('id');
	    });
	    Schema::create('image_identity_card_employees', function (Blueprint $table) {
		    $table->increments('id');
	    });
	    Schema::create('image_criminal_record_employees', function (Blueprint $table) {
		    $table->increments('id');
	    });
	    Schema::create('image_health_certificate_employees', function (Blueprint $table) {
		    $table->increments('id');
	    });
	    Schema::create('image_pension_certificate_employees', function (Blueprint $table) {
		    $table->increments('id');
	    });
	    Schema::create('image_rol_companies', function (Blueprint $table) {
		    $table->increments('id');
	    });
	    Schema::create('image_patent_companies', function (Blueprint $table) {
		    $table->increments('id');
	    });
    }
}
