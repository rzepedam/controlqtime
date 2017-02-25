<?php

use Controlqtime\Core\Entities\TypeProfessionalLicense;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeProfessionalLicenseEditTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $typeProfessionalLicense;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeProfessionalLicense = factory(TypeProfessionalLicense::class)->create();
	}
	
	function test_edit_professional_license()
	{
		$this->visit('maintainers/type-professional-licenses/' . $this->typeProfessionalLicense->id . '/edit')
			->seeInElement('h1', 'Editar Licencia Profesional: <span class="text-primary">' . $this->typeProfessionalLicense->id . '</span>')
			->seeInField('#name', $this->typeProfessionalLicense->name)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_professional_license()
	{
		$this->visit('maintainers/type-professional-licenses/' . $this->typeProfessionalLicense->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('type_professional_licenses', [
				'id'         => $this->typeProfessionalLicense->id,
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
	
}
