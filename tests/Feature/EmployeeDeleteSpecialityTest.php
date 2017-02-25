<?php

use Controlqtime\Core\Entities\Institution;
use Controlqtime\Core\Entities\TypeSpeciality;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeDeleteSpecialityTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $step1_update;
	
	protected $step2_update;
	
	protected $step3_update;
	
	protected $speciality;
	
	protected $institution;
	
	protected $typeSpeciality;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		
		$this->step1_update = [
			'male_surname'               => 'Candia',
			'female_surname'             => 'Parra',
			'first_name'                 => 'Marcelo',
			'second_name'                => 'Pedro',
			'rut'                        => '10.486.861-4',
			'birthday'                   => '11-06-1989',
			'nationality_id'             => $this->nationality->id,
			'is_male'                    => 'M',
			'marital_status_id'          => $this->maritalStatus->id,
			'address'                    => 'Vicuña Mackenna 2209',
			'commune_id'                 => $this->commune->id,
			'phone1'                     => '+56988102910',
			'email_employee'             => 'marcelocandia@gmail.com',
			'count_contacts'             => 0,
			'count_family_relationships' => 0
		];
		
		$this->step2_update = [
			'count_studies'               => 0,
			'count_certifications'        => 0,
			'count_specialities'          => 0,
			'count_professional_licenses' => 0
		];
		
		$this->step3_update = [
			'count_disabilities'            => 0,
			'count_diseases'                => 0,
			'count_exams'                   => 0,
			'count_family_responsabilities' => 0
		];
		
		Session::put('step1_update', $this->step1_update);
		Session::put('step2_update', $this->step2_update);
		
		$this->institution    = factory(Institution::class)->create();
		$this->typeSpeciality = factory(TypeSpeciality::class)->create();
		
		$this->speciality = $this->employee->specialities()->create([
			'type_speciality_id'        => $this->typeSpeciality->id,
			'institution_speciality_id' => $this->institution->id,
			'emission_speciality'       => '22-10-1996',
			'expired_speciality'        => '28-03-2010'
		]);
	}
	
	function test_delete_a_speciality_employee()
	{
		Session::put('id_delete_speciality', json_encode([$this->speciality->id]));
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('specialities', [
				'id'                        => $this->speciality->id,
				'employee_id'               => $this->employee->id,
				'type_speciality_id'        => $this->typeSpeciality->id,
				'institution_speciality_id' => $this->institution->id,
				'emission_speciality'       => '1996-10-22',
				'expired_speciality'        => '2010-03-28'
			]);
	}
	
	function test_delete_a_speciality_and_image_employee()
	{
		$image = factory(\Controlqtime\Core\Entities\Image::class)->create([
			'imagesable_id'   => $this->speciality->id,
			'imagesable_type' => 'Controlqtime\Core\Entities\Speciality'
		]);
		
		Session::put('id_delete_speciality', json_encode([$this->speciality->id]));
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('specialities', [
				'id'                        => $this->speciality->id,
				'employee_id'               => $this->employee->id,
				'type_speciality_id'        => $this->typeSpeciality->id,
				'institution_speciality_id' => $this->institution->id,
				'emission_speciality'       => '1996-10-22',
				'expired_speciality'        => '2010-03-28'])
			->dontSeeInDatabase('images', [
				'id'              => $image->id,
				'imagesable_id'   => $this->speciality->id,
				'imagesable_type' => 'Controlqtime\Core\Entities\Speciality',
				'path'            => $image->path,
				'orig_name'       => $image->orig_name,
				'size'            => $image->size
			]);
	}
	
	function test_delete_than_one_speciality_employee()
	{
		$institution    = factory(Institution::class)->create();
		$typeSpeciality = factory(TypeSpeciality::class)->create();
		
		$speciality = $this->employee->specialities()->create([
			'type_speciality_id'        => $typeSpeciality->id,
			'institution_speciality_id' => $institution->id,
			'emission_speciality'       => '17-06-2014',
			'expired_speciality'        => '27-05-2022'
		]);
		
		Session::put('id_delete_speciality', json_encode([$this->speciality->id, $speciality->id]));
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('specialities', [
				'id'                        => $this->speciality->id,
				'employee_id'               => $this->employee->id,
				'type_speciality_id'        => $this->typeSpeciality->id,
				'institution_speciality_id' => $this->institution->id,
				'emission_speciality'       => '1996-10-22',
				'expired_speciality'        => '2010-03-28'])
			->dontSeeInDatabase('specialities', [
				'id'                        => $this->speciality->id,
				'employee_id'               => $this->employee->id,
				'type_speciality_id'        => $typeSpeciality->id,
				'institution_speciality_id' => $institution->id,
				'emission_speciality'       => '2014-06-17',
				'expired_speciality'        => '2022-05-27'
			]);
	}
	
	function test_delete_than_one_speciality_and_than_one_image_employee()
	{
		$institution    = factory(Institution::class)->create();
		$typeSpeciality = factory(TypeSpeciality::class)->create();
		
		$speciality = $this->employee->specialities()->create([
			'type_speciality_id'        => $typeSpeciality->id,
			'institution_speciality_id' => $institution->id,
			'emission_speciality'       => '02-01-1996',
			'expired_speciality'        => '02-01-2026'
		]);
		
		$image1 = factory(\Controlqtime\Core\Entities\Image::class)->create([
			'imagesable_id'   => $this->speciality->id,
			'imagesable_type' => 'Controlqtime\Core\Entities\Speciality'
		]);
		
		$image2 = factory(\Controlqtime\Core\Entities\Image::class)->create([
			'imagesable_id'   => $speciality->id,
			'imagesable_type' => 'Controlqtime\Core\Entities\Speciality'
		]);
		
		Session::put('id_delete_speciality', json_encode([$this->speciality->id, $speciality->id]));
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('specialities', [
				'id'                        => $this->speciality->id,
				'employee_id'               => $this->employee->id,
				'type_speciality_id'        => $this->typeSpeciality->id,
				'institution_speciality_id' => $this->institution->id,
				'emission_speciality'       => '1996-10-22',
				'expired_speciality'        => '2010-03-28'])
			->dontSeeInDatabase('images', [
				'id'              => $image1->id,
				'imagesable_id'   => $this->speciality->id,
				'imagesable_type' => 'Controlqtime\Core\Entities\Speciality',
				'path'            => $image1->path,
				'orig_name'       => $image1->orig_name,
				'size'            => $image1->size])
			->dontSeeInDatabase('specialities', [
				'id'                        => $speciality->id,
				'employee_id'               => $this->employee->id,
				'type_speciality_id'        => $typeSpeciality->id,
				'institution_speciality_id' => $institution->id,
				'emission_speciality'       => '1996-01-02',
				'expired_speciality'        => '2026-01-02'])
			->dontSeeInDatabase('images', [
				'id'              => $image2->id,
				'imagesable_id'   => $speciality->id,
				'imagesable_type' => 'Controlqtime\Core\Entities\Speciality',
				'path'            => $image2->path,
				'orig_name'       => $image2->orig_name,
				'size'            => $image2->size
			]);
	}
	
}
