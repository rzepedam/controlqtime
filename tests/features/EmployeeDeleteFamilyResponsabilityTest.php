<?php

use Controlqtime\Core\Entities\Relationship;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeDeleteFamilyResponsabilityTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $step1_update;
	
	protected $step2_update;
	
	protected $step3_update;
	
	protected $relationship;
	
	protected $familyResponsability;
	
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
		
		$this->relationship = factory(Relationship::class)->create();
		
		$this->familyResponsability = $this->employee->familyResponsabilities()->create([
			'name_responsability' => 'Andrés Camargo Salas',
			'rut_responsability'  => '15.257.414-2',
			'relationship_id'     => $this->relationship->id,
		]);
	}
	
	function test_delete_a_family_responsability_employee()
	{
		$this->step3_update += [
			'id_delete_family_responsability' => [$this->familyResponsability->id]
		];
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('family_responsabilities', [
				'id'                  => $this->familyResponsability->id,
				'employee_id'         => $this->employee->id,
				'name_responsability' => 'Andrés Camargo Salas',
				'rut_responsability'  => '15257414-2',
				'relationship_id'     => $this->relationship->id,
			]);
	}
	
	function test_delete_a_family_responsability_and_image_employee()
	{
		$image = factory(\Controlqtime\Core\Entities\Image::class)->create([
			'imagesable_id'   => $this->familyResponsability->id,
			'imagesable_type' => 'Controlqtime\Core\Entities\FamilyResponsability'
		]);
		
		$this->step3_update += [
			'id_delete_family_responsability' => [$this->familyResponsability->id]
		];
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('family_responsabilities', [
				'id'                  => $this->familyResponsability->id,
				'employee_id'         => $this->employee->id,
				'name_responsability' => 'Andrés Camargo Salas',
				'rut_responsability'  => '15257414-2',
				'relationship_id'     => $this->relationship->id])
			->dontSeeInDatabase('images', [
				'id'              => $image->id,
				'imagesable_id'   => $this->familyResponsability->id,
				'imagesable_type' => 'Controlqtime\Core\Entities\FamilyResponsability',
				'path'            => $image->path,
				'orig_name'       => $image->orig_name,
				'size'            => $image->size
			]);
	}
	
	function test_delete_than_one_family_responsability_employee()
	{
		$relationship = factory(Relationship::class)->create();
		
		$familyResponsability = $this->employee->familyResponsabilities()->create([
			'name_responsability' => 'Raúl Meza Mora',
			'rut_responsability'  => '17.032.680-6',
			'relationship_id'     => $relationship->id,
		]);
		
		$this->step3_update += [
			'id_delete_family_responsability' => [$this->familyResponsability->id, $familyResponsability->id]
		];
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('family_responsabilities', [
				'id'                  => $this->familyResponsability->id,
				'employee_id'         => $this->employee->id,
				'name_responsability' => 'Andrés Camargo Salas',
				'rut_responsability'  => '15257414-2',
				'relationship_id'     => $this->relationship->id])
			->dontSeeInDatabase('family_responsabilities', [
				'id'                  => $familyResponsability->id,
				'employee_id'         => $this->employee->id,
				'name_responsability' => 'Raúl Meza Mora',
				'rut_responsability'  => '17032680-6',
				'relationship_id'     => $relationship->id
			]);
	}
	
	function test_delete_than_one_family_responsability_and_than_one_image_employee()
	{
		$relationship = factory(Relationship::class)->create();
		
		$familyResponsability = $this->employee->familyResponsabilities()->create([
			'name_responsability' => 'Raúl Meza Mora',
			'rut_responsability'  => '17.032.680-6',
			'relationship_id'     => $relationship->id,
		]);
		
		$this->step3_update += [
			'id_delete_family_responsability' => [$this->familyResponsability->id, $familyResponsability->id]
		];
		
		$image1 = factory(\Controlqtime\Core\Entities\Image::class)->create([
			'imagesable_id'   => $this->familyResponsability->id,
			'imagesable_type' => 'Controlqtime\Core\Entities\FamilyResponsability'
		]);
		
		$image2 = factory(\Controlqtime\Core\Entities\Image::class)->create([
			'imagesable_id'   => $familyResponsability->id,
			'imagesable_type' => 'Controlqtime\Core\Entities\FamilyResponsability'
		]);
		
		$this->put('human-resources/employees/' . $this->employee->id, $this->step3_update)
			->dontSeeInDatabase('family_responsabilities', [
				'id'                  => $this->familyResponsability->id,
				'employee_id'         => $this->employee->id,
				'name_responsability' => 'Andrés Camargo Salas',
				'rut_responsability'  => '15257414-2',
				'relationship_id'     => $this->relationship->id])
			->dontSeeInDatabase('images', [
				'id'              => $image1->id,
				'imagesable_id'   => $this->familyResponsability->id,
				'imagesable_type' => 'Controlqtime\Core\Entities\FamilyResponsability',
				'path'            => $image1->path,
				'orig_name'       => $image1->orig_name,
				'size'            => $image1->size])
			->dontSeeInDatabase('family_responsabilities', [
				'id'                  => $familyResponsability->id,
				'employee_id'         => $this->employee->id,
				'name_responsability' => 'Raúl Meza Mora',
				'rut_responsability'  => '17032680-6',
				'relationship_id'     => $relationship->id,])
			->dontSeeInDatabase('images', [
				'id'              => $image2->id,
				'imagesable_id'   => $familyResponsability->id,
				'imagesable_type' => 'Controlqtime\Core\Entities\FamilyResponsability',
				'path'            => $image2->path,
				'orig_name'       => $image2->orig_name,
				'size'            => $image2->size
			]);
	}
}
