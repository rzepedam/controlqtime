<?php

use Controlqtime\Core\Entities\TypeDisease;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeDeleteDiseaseTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $step1_update;
	
	protected $step2_update;
	
	protected $step3_update;
	
	protected $typeDisease;
	
	protected $disease;
	
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
		
		$this->typeDisease = factory(TypeDisease::class)->create();
		
		$this->disease = $this->employee->diseases()->create([
			'type_disease_id'   => $this->typeDisease->id,
			'treatment_disease' => true,
			'detail_disease'    => 'Lorem ipsum dolor sit amet'
		]);
	}
	
	function test_delete_a_disease_employee()
	{
		$this->step3_update += [
			'id_delete_disease' => json_encode([$this->disease->id])
		];
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('diseases', [
				'id'                => $this->disease->id,
				'employee_id'       => $this->employee->id,
				'type_disease_id'   => $this->typeDisease->id,
				'treatment_disease' => true,
				'detail_disease'    => 'Lorem ipsum dolor sit amet'
			]);
	}
	
	function test_delete_a_disease_and_image_employee()
	{
		$image = factory(\Controlqtime\Core\Entities\Image::class)->create([
			'imagesable_id'   => $this->disease->id,
			'imagesable_type' => 'Controlqtime\Core\Entities\Disease'
		]);
		
		$this->step3_update += [
			'id_delete_disease' => json_encode([$this->disease->id])
		];
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('diseases', [
				'id'                => $this->disease->id,
				'employee_id'       => $this->employee->id,
				'type_disease_id'   => $this->typeDisease->id,
				'treatment_disease' => true,
				'detail_disease'    => 'Lorem ipsum dolor sit amet'])
			->dontSeeInDatabase('images', [
				'id'              => $image->id,
				'imagesable_id'   => $this->disease->id,
				'imagesable_type' => 'Controlqtime\Core\Entities\Disease',
				'path'            => $image->path,
				'orig_name'       => $image->orig_name,
				'size'            => $image->size
			]);
	}
	
	function test_delete_than_one_disease_employee()
	{
		$typeDisease = factory(TypeDisease::class)->create();
		
		$disease = $this->employee->diseases()->create([
			'type_disease_id'   => $typeDisease->id,
			'treatment_disease' => false,
			'detail_disease'    => 'Lorem'
		]);
		
		$this->step3_update += [
			'id_delete_disease' => json_encode([$this->disease->id, $disease->id])
		];
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('diseases', [
				'id'                => $this->disease->id,
				'employee_id'       => $this->employee->id,
				'type_disease_id'   => $this->typeDisease->id,
				'treatment_disease' => true,
				'detail_disease'    => 'Lorem ipsum dolor sit amet'])
			->dontSeeInDatabase('diseases', [
				'id'                => $disease->id,
				'employee_id'       => $this->employee->id,
				'type_disease_id'   => $typeDisease->id,
				'treatment_disease' => false,
				'detail_disease'    => 'Lorem'
			]);
	}
	
	function test_delete_than_one_disease_and_than_one_image_employee()
	{
		$typeDisease = factory(TypeDisease::class)->create();
		
		$disease = $this->employee->diseases()->create([
			'type_disease_id'   => $typeDisease->id,
			'treatment_disease' => false,
			'detail_disease'    => 'Lorem'
		]);
		
		$this->step3_update += [
			'id_delete_disease' => json_encode([$this->disease->id, $disease->id])
		];
		
		$image1 = factory(\Controlqtime\Core\Entities\Image::class)->create([
			'imagesable_id'   => $this->disease->id,
			'imagesable_type' => 'Controlqtime\Core\Entities\Disease'
		]);
		
		$image2 = factory(\Controlqtime\Core\Entities\Image::class)->create([
			'imagesable_id'   => $disease->id,
			'imagesable_type' => 'Controlqtime\Core\Entities\Disease'
		]);
		
		$this->step3_update += [
			'id_delete_disease' => [$this->disease->id, $disease->id]
		];
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('diseases', [
				'id'                => $this->disease->id,
				'employee_id'       => $this->employee->id,
				'type_disease_id'   => $this->typeDisease->id,
				'treatment_disease' => true,
				'detail_disease'    => 'Lorem ipsum dolor sit amet'])
			->dontSeeInDatabase('diseases', [
				'id'                => $disease->id,
				'employee_id'       => $this->employee->id,
				'type_disease_id'   => $typeDisease->id,
				'treatment_disease' => false,
				'detail_disease'    => 'Lorem'])
			->dontSeeInDatabase('images', [
				'id'              => $image1->id,
				'imagesable_id'   => $this->disease->id,
				'imagesable_type' => 'Controlqtime\Core\Entities\Disease',
				'path'            => $image1->path,
				'orig_name'       => $image1->orig_name,
				'size'            => $image1->size])
			->dontSeeInDatabase('images', [
				'id'              => $image2->id,
				'imagesable_id'   => $disease->id,
				'imagesable_type' => 'Controlqtime\Core\Entities\Disease',
				'path'            => $image2->path,
				'orig_name'       => $image2->orig_name,
				'size'            => $image2->size
			]);
	}
}
