<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeProfessionalLicenseDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $typeProfessionalLicense;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeProfessionalLicense = factory(\Controlqtime\Core\Entities\TypeProfessionalLicense::class)->create();
	}
	
	function test_delete_professional_license()
	{
		$this->delete('maintainers/type-professional-licenses/' . $this->typeProfessionalLicense->id)
			->dontSeeInDatabase('type_professional_licenses', [
				'id'         => $this->typeProfessionalLicense->id,
				'deleted_at' => null
			]);
	}
}
