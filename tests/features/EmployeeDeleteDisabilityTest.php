<?php

use Controlqtime\Core\Entities\TypeDisability;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeDeleteDisabilityTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $step1_update;
	
	protected $step2_update;
	
	protected $step3_update;
	
	protected $disability;
	
	protected $typeDisability;
	
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
			'forecast_id'                => $this->forecast->id,
			'pension_id'                 => $this->pension->id,
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
		
		$this->typeDisability = factory(TypeDisability::class)->create();
		
		$this->disability = $this->employee->disabilities()->create([
			'type_disability_id'   => $this->typeDisability->id,
			'treatment_disability' => true,
			'detail_disability'    => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit',
		]);
	}
	
	function test_delete_a_disability_employee()
	{
		$this->step3_update += [
			'id_delete_disability' => json_encode([$this->disability->id])
		];
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('disabilities', [
				'id'                   => $this->disability->id,
				'employee_id'          => $this->employee->id,
				'type_disability_id'   => $this->typeDisability->id,
				'treatment_disability' => true,
				'detail_disability'    => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit'
			]);
	}
	
	function test_delete_a_disability_and_image_employee()
	{
		$image = factory(\Controlqtime\Core\Entities\Image::class)->create([
			'imagesable_id'   => $this->disability->id,
			'imagesable_type' => 'Controlqtime\Core\Entities\Disability'
		]);
		
		$this->step3_update += [
			'id_delete_disability' => json_encode([$this->disability->id])
		];
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('disabilities', [
				'id'                   => $this->disability->id,
				'employee_id'          => $this->employee->id,
				'type_disability_id'   => $this->typeDisability->id,
				'treatment_disability' => true,
				'detail_disability'    => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit'])
			->dontSeeInDatabase('images', [
				'id'              => $image->id,
				'imagesable_id'   => $this->disability->id,
				'imagesable_type' => 'Controlqtime\Core\Entities\Disability',
				'path'            => $image->path,
				'orig_name'       => $image->orig_name,
				'size'            => $image->size
			]);
	}
	
	function test_delete_than_one_disability_employee()
	{
		$typeDisability = factory(TypeDisability::class)->create();
		
		$disability = $this->employee->disabilities()->create([
			'type_disability_id'   => $typeDisability->id,
			'treatment_disability' => false,
			'detail_disability'    => '',
		]);
		
		$this->step3_update += [
			'id_delete_disability' => json_encode([$this->disability->id, $disability->id])
		];
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('disabilities', [
				'id'                   => $this->disability->id,
				'employee_id'          => $this->employee->id,
				'type_disability_id'   => $this->typeDisability->id,
				'treatment_disability' => true,
				'detail_disability'    => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit'])
			->dontSeeInDatabase('disabilities', [
				'id'                   => $disability->id,
				'employee_id'          => $this->employee->id,
				'type_disability_id'   => $typeDisability->id,
				'treatment_disability' => false,
				'detail_disability'    => ''
			]);
	}
	
	function test_delete_than_one_disability_and_than_one_image_employee()
	{
		$typeDisability = factory(TypeDisability::class)->create();
		
		$disability = $this->employee->disabilities()->create([
			'type_disability_id'   => $typeDisability->id,
			'treatment_disability' => false,
			'detail_disability'    => '',
		]);
		
		$image1 = factory(\Controlqtime\Core\Entities\Image::class)->create([
			'imagesable_id'   => $this->disability->id,
			'imagesable_type' => 'Controlqtime\Core\Entities\Disability'
		]);
		
		$image2 = factory(\Controlqtime\Core\Entities\Image::class)->create([
			'imagesable_id'   => $disability->id,
			'imagesable_type' => 'Controlqtime\Core\Entities\Disability'
		]);
		
		$this->step3_update += [
			'id_delete_disability' => json_encode([$this->disability->id, $disability->id])
		];
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('disabilities', [
				'id'                   => $this->disability->id,
				'employee_id'          => $this->employee->id,
				'type_disability_id'   => $this->typeDisability->id,
				'treatment_disability' => true,
				'detail_disability'    => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit'])
			->dontSeeInDatabase('disabilities', [
				'id'                   => $disability->id,
				'employee_id'          => $this->employee->id,
				'type_disability_id'   => $typeDisability->id,
				'treatment_disability' => false,
				'detail_disability'    => ''])
			->dontSeeInDatabase('images', [
				'id'              => $image1->id,
				'imagesable_id'   => $this->disability->id,
				'imagesable_type' => 'Controlqtime\Core\Entities\Disability',
				'path'            => $image1->path,
				'orig_name'       => $image1->orig_name,
				'size'            => $image1->size])
			->dontSeeInDatabase('images', [
				'id'              => $image2->id,
				'imagesable_id'   => $disability->id,
				'imagesable_type' => 'Controlqtime\Core\Entities\Disability',
				'path'            => $image2->path,
				'orig_name'       => $image2->orig_name,
				'size'            => $image2->size
			]);
	}
}
