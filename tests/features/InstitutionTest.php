<?php

use Controlqtime\Core\Entities\Institution;
use Controlqtime\Core\Entities\TypeInstitution;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InstitutionTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $institution;
	
	protected $typeInstitution;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeInstitution = factory(TypeInstitution::class)->create();
		$this->institution     = factory(Institution::class)->create();
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
	
	function test_create_institution()
	{
		$this->visit('maintainers/institutions/create')
			->seeInElement('h1', 'Crear Nueva Institución')
			->see('Nombre')
			->see('Tipo de Institución')
			->seeInElement('#type_institution_id', $this->typeInstitution->name)
			->see('Guardar');
	}
	
	function test_store_institution()
	{
		$this->visit('maintainers/institutions/create')
			->type('test', 'name')
			->select($this->typeInstitution->id, 'type_institution_id')
			->press('Guardar')
			->seeInDatabase('institutions', [
				'name'                => 'test',
				'type_institution_id' => $this->typeInstitution->id,
				'deleted_at'          => null
			]);
	}
	
	function test_edit_institution()
	{
		$this->visit('maintainers/institutions/' . $this->institution->id . '/edit')
			->seeInElement('h1', 'Editar Institución: <span class="text-primary">' . $this->institution->id . '</span>')
			->seeInField('#name', $this->institution->name)
			->seeInElement('#type_institution_id', $this->institution->id)
			->see('Actualizar');
	}
	
	function test_update_institution()
	{
		$id              = $this->institution->id + 1;
		$typeInstitution = factory(TypeInstitution::class)->create([
			'id'   => $id,
			'name' => 'test'
		]);
		
		$this->visit('maintainers/institutions/' . $this->institution->id . '/edit')
			->type('test', 'name')
			->select($typeInstitution->id, '#type_institution_id')
			->press('Actualizar')
			->seeInDatabase('institutions', [
				'id'                  => $this->institution->id,
				'name'                => 'test',
				'type_institution_id' => $typeInstitution->id,
				'deleted_at'          => null
			]);
	}
	
	function test_delete_institution()
	{
		$this->delete('maintainers/institutions/' . $this->institution->id)
			->dontSeeInDatabase('institutions', [
				'id'                  => $this->institution->id,
				'name'                => $this->institution->name,
				'type_institution_id' => $this->institution->type_institution_id,
				'deleted_at'          => null
			]);
	}
	
	function test_restore_institution()
	{
		$this->institution->delete();
		
		$this->visit('maintainers/institutions/create')
			->type($this->institution->name, 'name')
			->select($this->institution->type_institution_id, '#type_institution_id')
			->press('Guardar')
			->seeInDatabase('institutions', [
				'id'                  => $this->institution->id,
				'name'                => $this->institution->name,
				'type_institution_id' => $this->institution->type_institution_id,
				'deleted_at'          => null
			]);
	}
	
}
