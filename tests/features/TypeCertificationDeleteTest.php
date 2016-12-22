<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeCertificationDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $typeCertification;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeCertification = factory(\Controlqtime\Core\Entities\TypeCertification::class)->create();
	}
	
	function test_delete_type_certification()
	{
		$this->delete('maintainers/type-certifications/' . $this->typeCertification->id)
			->dontSeeInDatabase('type_certifications', [
				'id'         => $this->typeCertification->id,
				'deleted_at' => null
			]);
	}
}
