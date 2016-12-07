<?php

use Controlqtime\Core\Entities\Degree;
use Controlqtime\Core\Entities\DetailAddressLegalEmployee;
use Controlqtime\Core\Entities\Region;
use Controlqtime\Core\Entities\Address;
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
	
	protected $gender;
	
	protected $address;
	
	protected $detailAddressLegalEmployee;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->address                    = factory(Address::class)->create();
		$this->detailAddressLegalEmployee = factory(DetailAddressLegalEmployee::class)->create();
		$this->nationality                = factory(Nationality::class)->create();
		$this->gender                     = Config::get('enums.genders');
		$this->degree                     = factory(Degree::class)->create();
		$this->forecast                   = factory(Forecast::class)->create();
		$this->maritalStatus              = factory(MaritalStatus::class)->create();
		$this->institution                = factory(Institution::class)->create();
		$this->pension                    = factory(Pension::class)->create();
		$this->region                     = factory(Region::class)->create();
		$this->commune                    = factory(Commune::class)->create();
		$this->province                   = factory(Province::class)->create();
		$this->relationship               = factory(Relationship::class)->create();
		$this->typeCertification          = factory(TypeCertification::class)->create();
		$this->typeDisability             = factory(TypeDisability::class)->create();
		$this->typeDisease                = factory(TypeDisease::class)->create();
		$this->typeExam                   = factory(TypeExam::class)->create();
		$this->typeProfessionalLicense    = factory(TypeProfessionalLicense::class)->create();
		$this->typeSpeciality             = factory(TypeSpeciality::class)->create();
	}
	
	function test_edit_employee()
	{
		$this->visit('human-resources/employees/' . $this->employee->id . '/edit')
			->assertResponseOk();
	}
}
