<?php

use Controlqtime\Core\Entities\Degree;
use Controlqtime\Core\Entities\Region;
use Controlqtime\Core\Entities\Commune;
use Controlqtime\Core\Entities\Pension;
use Controlqtime\Core\Entities\Forecast;
use Controlqtime\Core\Entities\Province;
use Controlqtime\Core\Entities\TypeExam;
use Controlqtime\Core\Entities\Institution;
use Controlqtime\Core\Entities\Nationality;
use Controlqtime\Core\Entities\TypeDisease;
use Controlqtime\Core\Entities\Relationship;
use Controlqtime\Core\Entities\MaritalStatus;
use Controlqtime\Core\Entities\TypeDisability;
use Controlqtime\Core\Entities\TypeSpeciality;
use Controlqtime\Core\Entities\TypeCertification;
use Controlqtime\Core\Entities\TypeProfessionalLicense;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeEditTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $degree;
	
	protected $forecast;
	
	protected $maritalStatus;
	
	protected $nationality;
	
	protected $institution;
	
	protected $pension;
	
	protected $region;
	
	protected $province;
	
	protected $commune;
	
	protected $relationship;
	
	protected $typeCertification;
	
	protected $typeDisability;
	
	protected $typeDisease;
	
	protected $typeExam;
	
	protected $typeProfessionalLicense;
	
	protected $typeSpeciality;
	
	protected $address;
	
	protected $detailAddressLegalEmployee;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->nationality             = factory(Nationality::class)->create();
		$this->degree                  = factory(Degree::class)->create();
		$this->forecast                = factory(Forecast::class)->create();
		$this->maritalStatus           = factory(MaritalStatus::class)->create();
		$this->institution             = factory(Institution::class)->create();
		$this->pension                 = factory(Pension::class)->create();
		$this->region                  = factory(Region::class)->create();
		$this->commune                 = factory(Commune::class)->create();
		$this->province                = factory(Province::class)->create();
		$this->relationship            = factory(Relationship::class)->create();
		$this->typeCertification       = factory(TypeCertification::class)->create();
		$this->typeDisability          = factory(TypeDisability::class)->create();
		$this->typeDisease             = factory(TypeDisease::class)->create();
		$this->typeExam                = factory(TypeExam::class)->create();
		$this->typeProfessionalLicense = factory(TypeProfessionalLicense::class)->create();
		$this->typeSpeciality          = factory(TypeSpeciality::class)->create();
	}
	
	function test_edit_employee()
	{
		$this->visit('human-resources/employees/' . $this->employee->id . '/edit')
			->seeInElement('h1', 'Editar Trabajador: <span class="text-primary">' . $this->employee->id . '</span>')
			->seeInField('#male_surname', $this->employee->male_surname)
			->seeInField('#female_surname', $this->employee->female_surname)
			->seeInField('#first_name', $this->employee->first_name)
			->seeInField('#second_name', $this->employee->second_name)
			->seeInField('#rut', $this->employee->rut)
			->seeInField('#birthday', $this->employee->birthday)
			->seeInElement('#nationality_id', $this->employee->nationality->name)
			->seeIsSelected('is_male', 'M')
			->seeInElement('#marital_status_id', $this->employee->maritalStatus->id)
			->seeInElement('#forecast_id', $this->employee->forecast->id)
			->seeInElement('#pension_id', $this->employee->pension->id)
			->seeInField('#address', $this->employee->address->address)
			->seeInField('#depto', $this->employee->address->detailAddressLegalEmployee->depto)
			->seeInField('#block', $this->employee->address->detailAddressLegalEmployee->block)
			->seeInField('#num_home', $this->employee->address->detailAddressLegalEmployee->num_home)
			->seeInElement('#region_id', $this->employee->address->commune->province->region->id)
			->seeInElement('#province_id', $this->employee->address->commune->province->id)
			->seeInElement('#commune_id', $this->employee->address->commune->id)
			->seeInField('#phone1', $this->employee->address->phone1)
			->seeInField('#phone2', $this->employee->address->phone2)
			->seeInField('email_employee', $this->employee->email_employee)
			->assertResponseOk();
	}
	
	function test_update_employee()
	{
		$nationality = factory(Nationality::class)->create([
			'name' => 'Argentina'
		]);
		
		$maritalStatus = factory(MaritalStatus::class)->create([
			'name' => 'Viudo'
		]);
		
		$forecast = factory(Forecast::class)->create([
			'name' => 'Banmédica'
		]);
		
		$pension = factory(Pension::class)->create([
			'name' => 'Modelo'
		]);
		
		$region = factory(Region::class)->create([
			'name' => 'Región de Arica y Parinacota'
		]);
		
		$province = factory(Province::class)->create([
			'region_id' => $region->id,
			'name'      => 'Parinacota'
		]);
		
		$commune = factory(Commune::class)->create([
			'province_id' => $province->id,
			'name'        => 'Camarones'
		]);
		
		$sessionUpdateStep1 = [
			'male_surname'               => 'Escobar',
			'female_surname'             => 'Parra',
			'first_name'                 => 'Marta',
			'second_name'                => 'Alejandra',
			'full_name'                  => 'Marta Alejandra Escobar Parra',
			'rut'                        => '12.214.257-4',
			'birthday'                   => '15-04-1982',
			'nationality_id'             => $nationality->id,
			'is_male'                    => 'F',
			'marital_status_id'          => $maritalStatus->id,
			'forecast_id'                => $forecast->id,
			'pension_id'                 => $pension->id,
			'address'                    => 'José Miguel Carrera 1391. Villa San Alberto',
			'depto'                      => '303',
			'block'                      => '',
			'num_home'                   => '',
			'region_id'                  => $region->id,
			'province_id'                => $province->id,
			'commune_id'                 => $commune->id,
			'phone1'                     => '+56974155784',
			'phone2'                     => '221122334',
			'email_employee'             => 'test@gmail.com',
			'count_contacts'             => 0,
			'count_family_relationships' => 0
		];
		
		$sessionUpdateStep2 = [
			'count_studies'               => 0,
			'count_certifications'        => 0,
			'count_specialities'          => 0,
			'count_professional_licenses' => 0
		];
		
		Session::put('step1_update', $sessionUpdateStep1);
		Session::put('email_employee', 'marcelocandia@gmail.com');
		Session::put('password', bcrypt('marcelocandia@gmail.com'));
		Session::put('step2_update', $sessionUpdateStep2);
		
		$data = [
			'count_disabilities'            => 0,
			'count_diseases'                => 0,
			'count_exams'                   => 0,
			'count_family_responsabilities' => 0
		];
		
		$this->put('human-resources/employees/' . $this->employee->id, $data)
			->seeInDatabase('employees', [
				'id'                => $this->employee->id,
				'male_surname'      => 'Escobar',
				'female_surname'    => 'Parra',
				'first_name'        => 'Marta',
				'second_name'       => 'Alejandra',
				'rut'               => '12214257-4',
				'birthday'          => '1982-04-15',
				'nationality_id'    => $nationality->id,
				'is_male'           => false,
				'marital_status_id' => $maritalStatus->id,
				'forecast_id'       => $forecast->id,
				'pension_id'        => $pension->id,
				'email_employee'    => 'test@gmail.com',
				'url'               => 'https://s3-sa-east-1.amazonaws.com/biometry/faces/2016/07/18/200031564881.jpg',
				'state'             => 'disable',
				'condition'         => 'unavailable',
				'deleted_at'        => null
			]);
		
		$this->seeInDatabase('users', [
			'email' => 'test@gmail.com'
		]);
		
		$this->seeInDatabase('addresses', [
			'addressable_type' => 'Controlqtime\Core\Entities\Employee',
			'address'          => 'José Miguel Carrera 1391. Villa San Alberto',
			'commune_id'       => $commune->id,
			'phone1'           => '+56974155784',
			'phone2'           => '221122334'
		]);
		
		$this->seeInDatabase('detail_address_legal_employees', [
			'depto'    => '303',
			'block'    => '',
			'num_home' => ''
		]);
	}
}
