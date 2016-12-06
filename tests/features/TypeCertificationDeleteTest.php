<?php

use Controlqtime\Core\Entities\TypeCertification;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeCertificationDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $typeCertification;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeCertification = factory(TypeCertification::class)->create();
	}
	
	function test_delete_type_certification()
	{
		$this->delete('maintainers/type-certifications/' . $this->typeCertification->id)
			->dontSeeInDatabase('type_certifications', [
				'id'         => $this->typeCertification->id,
				'name'       => $this->typeCertification->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_type_certification()
	{
		$this->typeCertification->delete();
		
		$this->visit('maintainers/type-certifications/create')
			->type($this->typeCertification->name, 'name')
			->press('Guardar')
			->seeInDatabase('type_certifications', [
				'id'         => $this->typeCertification->id,
				'name'       => $this->typeCertification->name,
				'deleted_at' => null
			]);
	}
	
}
