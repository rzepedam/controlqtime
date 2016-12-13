<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class InstitutionIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $institution;
	
	protected $typeInstitution;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_institution()
	{
		$this->visit('maintainers/institutions')
			->assertResponseOk();
	}
	
	function test_route_institution()
	{
		$this->visitRoute('institutions.index')
			->assertResponseOk();
	}
	
	function test_index_institution()
	{
		$this->visit('maintainers/institutions')
			->seeInElement('h1', 'Listado de Instituciones')
			->see('Crear Nueva Institución')
			->see('Nombre')
			->see('Tipo Institución');
	}
}
