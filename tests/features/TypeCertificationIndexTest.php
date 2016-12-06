<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeCertificationIndexTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_url_type_certification()
	{
		$this->visit('maintainers/type-certifications')
			->assertResponseOk();
	}
	
	function test_route_type_certification()
	{
		$this->visitRoute('type-certifications.index')
			->assertResponseOk();
	}
	
	function test_index_type_certification()
	{
		$this->visit('maintainers/type-certifications')
			->seeInElement('h1', 'Listado de Certificaciones')
			->seeInElement('a', 'Crear Nueva Certificación')
			->see('Nombre');
	}
}
