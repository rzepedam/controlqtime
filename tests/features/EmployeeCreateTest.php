<?php

use Controlqtime\Core\Entities\Degree;
use Controlqtime\Core\Entities\TypeExam;
use Controlqtime\Core\Entities\Institution;
use Controlqtime\Core\Entities\TypeDisease;
use Controlqtime\Core\Entities\Relationship;
use Controlqtime\Core\Entities\TypeDisability;
use Controlqtime\Core\Entities\TypeSpeciality;
use Controlqtime\Core\Entities\TypeCertification;
use Controlqtime\Core\Entities\TypeProfessionalLicense;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeCreateTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $degree;
	
	protected $institution;
	
	protected $relationship;
	
	protected $typeCertification;
	
	protected $typeDisability;
	
	protected $typeDisease;
	
	protected $typeExam;
	
	protected $typeProfessionalLicense;
	
	protected $typeSpeciality;
	
	protected $sessionStep1;
	
	protected $sessionStep2;
	
	protected $sessionStep3;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->degree                  = factory(Degree::class)->create();
		$this->institution             = factory(Institution::class)->create();
		$this->relationship            = factory(Relationship::class)->create();
		$this->typeCertification       = factory(TypeCertification::class)->create();
		$this->typeDisability          = factory(TypeDisability::class)->create();
		$this->typeDisease             = factory(TypeDisease::class)->create();
		$this->typeExam                = factory(TypeExam::class)->create();
		$this->typeProfessionalLicense = factory(TypeProfessionalLicense::class)->create();
		$this->typeSpeciality          = factory(TypeSpeciality::class)->create();
		
		$this->sessionStep1 = [
			'male_surname'      => 'Candia',
			'female_surname'    => 'Parra',
			'first_name'        => 'Marcelo',
			'second_name'       => 'Pedro',
			'rut'               => '10.486.861-4',
			'birthday'          => '11-06-1989',
			'nationality_id'    => $this->nationality->id,
			'is_male'           => 'M',
			'marital_status_id' => $this->maritalStatus->id,
			'forecast_id'       => $this->forecast->id,
			'pension_id'        => $this->pension->id,
			'address'           => 'Vicuña Mackenna 2209',
			'commune_id'        => $this->commune->id,
			'phone1'            => '+56988102910',
			'email_employee'    => 'marcelocandia@gmail.com',
		];
		
		Session::put('email_employee', 'marcelocandia@gmail.com');
		Session::put('password', bcrypt('marcelocandia@gmail.com'));
	}
	
	function test_create_employee()
	{
		$this->visit('human-resources/employees/create')
			->seeInElement('h1', 'Crear Nuevo Trabajador')
			->seeInElement('#nationality_id', $this->nationality->name)
			->seeIsSelected('is_male', 'M')
			->seeInElement('#marital_status_id', $this->maritalStatus->name)
			->seeInElement('#forecast_id', $this->forecast->name)
			->seeInElement('#pension_id', $this->pension->name)
			->seeInElement('#region_id', $this->region->name)
			->seeInElement('#province_id', $this->province->name)
			->seeInElement('#commune_id', $this->commune->name)
			->assertResponseOk();
	}
	
	function test_store_employee()
	{
		$this->sessionStep1 += [
			'count_contacts'             => 0,
			'count_family_relationships' => 0
		];
		
		$this->sessionStep2 = [
			'count_studies'               => 0,
			'count_certifications'        => 0,
			'count_specialities'          => 0,
			'count_professional_licenses' => 0
		];
		
		$this->sessionStep3 = [
			'count_disabilities'            => 0,
			'count_diseases'                => 0,
			'count_exams'                   => 0,
			'count_family_responsabilities' => 0
		];
		
		Session::put('step1', $this->sessionStep1);
		Session::put('step2', $this->sessionStep2);
		
		$this->post('human-resources/employees', $this->sessionStep3)
			->seeInDatabase('employees', [
				'male_surname'      => 'Candia',
				'female_surname'    => 'Parra',
				'first_name'        => 'Marcelo',
				'second_name'       => 'Pedro',
				'rut'               => '10486861-4',
				'birthday'          => '1989-06-11',
				'nationality_id'    => 1,
				'is_male'           => true,
				'marital_status_id' => 1,
				'forecast_id'       => 1,
				'pension_id'        => 1,
				'email_employee'    => 'marcelocandia@gmail.com',
				'url'               => null,
				'state'             => 'disable',
				'condition'         => 'unavailable',
				'deleted_at'        => null
			]);
		
		$this->seeInDatabase('users', [
			'email' => 'marcelocandia@gmail.com'
		]);
		
		$this->seeInDatabase('addresses', [
			'addressable_type' => 'Controlqtime\Core\Entities\Employee',
			'address'          => 'Vicuña Mackenna 2209',
			'commune_id'       => 1,
			'phone1'           => '+56988102910',
			'phone2'           => ''
		]);
		
		$this->seeInDatabase('detail_address_legal_employees', [
			'depto'    => '',
			'block'    => '',
			'num_home' => ''
		]);
	}
	
	function test_store_with_contact_relationship_study_certification_speciality_license_disability_disease_exam_responsability_employee()
	{
		$this->sessionStep1 += [
			'id_contact'                 => [0],
			'contact_relationship_id'    => [$this->relationship->id],
			'name_contact'               => ['José Miguel Osorio Sepúlveda'],
			'email_contact'              => ['joseosorio@gmail.com'],
			'address_contact'            => ['Pje. Limahuida 1990'],
			'tel_contact'                => ['+56983401021'],
			'id_family_relationship'     => [0],
			'relationship_id'            => [$this->relationship->id],
			'employee_family_id'         => [$this->employee->id],
			'count_contacts'             => 1,
			'count_family_relationships' => 1
		];
		
		$degreeSchool = factory(Degree::class)->create(['id' => 2]);
		
		$this->sessionStep2 = [
			'id_study'                     => [0],
			'degree_id'                    => [$degreeSchool->id],
			'date_obtention'               => ['17-07-1998'],
			'name_institution'             => ['Colegio Altos de Lircay'],
			'id_certification'             => [0],
			'type_certification_id'        => [$this->typeCertification->id],
			'institution_certification_id' => [$this->institution->id],
			'emission_certification'       => ['13-02-2005'],
			'expired_certification'        => ['13-02-2015'],
			'id_speciality'                => [0],
			'type_speciality_id'           => [$this->typeSpeciality->id],
			'institution_speciality_id'    => [$this->institution->id],
			'emission_speciality'          => ['18-11-2009'],
			'expired_speciality'           => ['25-04-2017'],
			'id_professional_license'      => [0],
			'type_professional_license_id' => [$this->typeProfessionalLicense->id],
			'emission_license'             => ['12-08-2014'],
			'expired_license'              => ['17-08-2019'],
			'is_donor0'                    => true,
			'detail_license'               => ['Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean m'],
			'count_studies'                => 1,
			'count_certifications'         => 1,
			'count_specialities'           => 1,
			'count_professional_licenses'  => 1
		];
		
		$this->sessionStep3 = [
			'id_disability'                 => [0],
			'type_disability_id'            => [$this->typeDisability->id],
			'treatment_disability0'         => true,
			'detail_disability'             => ['Lorem ipsum dolor sit amet, consectetuer adipiscing elit'],
			'id_disease'                    => [0],
			'type_disease_id'               => [$this->typeDisease->id],
			'treatment_disease0'            => true,
			'detail_disease'                => ['Lorem ipsum dolor sit amet, consectetuer adipiscing elit'],
			'id_exam'                       => [0],
			'type_exam_id'                  => [$this->typeExam->id],
			'emission_exam'                 => ['07-04-2008'],
			'expired_exam'                  => ['19-10-2011'],
			'detail_exam'                   => ['Lorem ipsum dolor sit amet, consectetuer adipiscing elit'],
			'id_family_responsability'      => [0],
			'name_responsability'           => ['José Miguel Escobar Sepúlveda'],
			'rut_responsability'            => ['15.257.414-2'],
			'relationship_id'               => [$this->relationship->id],
			'count_disabilities'            => 1,
			'count_diseases'                => 1,
			'count_exams'                   => 1,
			'count_family_responsabilities' => 1
		];
		
		Session::put('step1', $this->sessionStep1);
		Session::put('step2', $this->sessionStep2);
		
		$this->post('human-resources/employees', $this->sessionStep3)
			->seeInDatabase('employees', [
				'male_surname'      => 'Candia',
				'female_surname'    => 'Parra',
				'first_name'        => 'Marcelo',
				'second_name'       => 'Pedro',
				'rut'               => '10486861-4',
				'birthday'          => '1989-06-11',
				'nationality_id'    => 1,
				'is_male'           => true,
				'marital_status_id' => 1,
				'forecast_id'       => 1,
				'pension_id'        => 1,
				'email_employee'    => 'marcelocandia@gmail.com',
				'url'               => null,
				'state'             => 'disable',
				'condition'         => 'unavailable',
				'deleted_at'        => null])
			->seeInDatabase('users', [
				'email' => 'marcelocandia@gmail.com'])
			->seeInDatabase('addresses', [
				'addressable_type' => 'Controlqtime\Core\Entities\Employee',
				'address'          => 'Vicuña Mackenna 2209',
				'commune_id'       => 1,
				'phone1'           => '+56988102910',
				'phone2'           => ''])
			->seeInDatabase('detail_address_legal_employees', [
				'depto'    => '',
				'block'    => '',
				'num_home' => ''])
			->seeInDatabase('contact_employees', [
				'name_contact'    => 'José Miguel Osorio Sepúlveda',
				'email_contact'   => 'joseosorio@gmail.com',
				'address_contact' => 'Pje. Limahuida 1990',
				'tel_contact'     => '+56983401021',
				'deleted_at'      => null])
			->seeInDatabase('family_relationships', [
				'relationship_id'    => $this->relationship->id,
				'employee_family_id' => $this->employee->id,
				'deleted_at'         => null])
			->seeInDatabase('studies', [
				'degree_id'      => $degreeSchool->id,
				'date_obtention' => '1998-07-17'])
			->seeInDatabase('detail_school_studies', [
				'name_institution' => 'Colegio Altos de Lircay'])
			->seeInDatabase('certifications', [
				'type_certification_id'        => $this->typeCertification->id,
				'institution_certification_id' => $this->institution->id,
				'emission_certification'       => '2005-02-13',
				'expired_certification'        => '2015-02-13',
				'deleted_at'                   => null])
			->seeInDatabase('specialities', [
				'type_speciality_id'        => $this->typeSpeciality->id,
				'institution_speciality_id' => $this->institution->id,
				'emission_speciality'       => '2009-11-18',
				'expired_speciality'        => '2017-04-25',
				'deleted_at'                => null])
			->seeInDatabase('professional_licenses', [
				'type_professional_license_id' => $this->typeProfessionalLicense->id,
				'emission_license'             => '2014-08-12',
				'expired_license'              => '2019-08-17',
				'is_donor'                     => true,
				'detail_license'               => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean m',
				'deleted_at'                   => null])
			->seeInDatabase('disabilities', [
				'type_disability_id'   => $this->typeDisability->id,
				'treatment_disability' => true,
				'detail_disability'    => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit',
				'deleted_at'           => null])
			->seeInDatabase('diseases', [
				'type_disease_id'   => $this->typeDisease->id,
				'treatment_disease' => true,
				'detail_disease'    => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit',
				'deleted_at'        => null])
			->seeInDatabase('exams', [
				'type_exam_id'  => $this->typeExam->id,
				'emission_exam' => '2008-04-07',
				'expired_exam'  => '2011-10-19',
				'detail_exam'   => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit',
				'deleted_at'    => null])
			->seeInDatabase('family_responsabilities', [
				'name_responsability' => 'José Miguel Escobar Sepúlveda',
				'rut_responsability'  => '15257414-2',
				'relationship_id'     => $this->relationship->id
			]);
	}
}
