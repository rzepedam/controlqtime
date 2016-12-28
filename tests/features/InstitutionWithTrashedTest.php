<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class InstitutionWithTrashedTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $institution;
	
	protected $typeInstitution;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->institution = factory(\Controlqtime\Core\Entities\Institution::class)->create();
	}
	
	function test_edit_institution_when_type_institution_is_deleted()
	{
		$this->delete('maintainers/type-institutions/' . $this->institution->typeInstitution->id);
		
		$this->visit('maintainers/institutions/' . $this->institution->id . '/edit')
			->seeInField('name', $this->institution->name)
			->seeInElement('#type_institution_id', 'Seleccione Tipo Institución...');
	}
}
