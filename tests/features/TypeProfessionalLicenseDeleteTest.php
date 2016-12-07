<?php

use Controlqtime\Core\Entities\TypeProfessionalLicense;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeProfessionalLicenseDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $typeProfessionalLicense;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeProfessionalLicense = factory(TypeProfessionalLicense::class)->create();
	}
	
	function test_delete_professional_license()
	{
		$this->delete('maintainers/type-professional-licenses/' . $this->typeProfessionalLicense->id)
			->dontSeeInDatabase('type_professional_licenses', [
				'id'         => $this->typeProfessionalLicense->id,
				'name'       => $this->typeProfessionalLicense->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_professional_licenses()
	{
		$this->typeProfessionalLicense->delete();
		
		$this->visit('maintainers/type-professional-licenses/create')
			->type($this->typeProfessionalLicense->name, 'name')
			->press('Guardar')
			->seeInDatabase('type_professional_licenses', [
				'id'         => $this->typeProfessionalLicense->id,
				'name'       => $this->typeProfessionalLicense->name,
				'deleted_at' => null
			]);
	}
}
