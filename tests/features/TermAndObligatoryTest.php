<?php

use Controlqtime\Core\Entities\TermAndObligatory;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TermAndObligatoryTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $term;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->term = factory(TermAndObligatory::class)->create();
	}
	
	function test_url_term_and_obligatory()
	{
		$this->visit('maintainers/terms-and-obligatories')
			->assertResponseOk();
	}
	
	function test_route_term_and_obligatory()
	{
		$this->visitRoute('terms-and-obligatories.index')
			->assertResponseOk();
	}
	
	function test_index_term_and_obligatory()
	{
		$this->visit('maintainers/terms-and-obligatories')
			->seeInElement('h1', 'Listado de Cláusulas y Obligaciones')
			->seeInElement('a', 'Crear Nueva Cláusula y Obligación')
			->see('Nombre')
			->see('Predeterminar');
	}
	
	function test_create_term_and_obligatory_with_default_equals_false()
	{
		$this->visit('maintainers/terms-and-obligatories/create')
			->see('Crear Nueva Cláusula y Obligación')
			->type('Test to new term and obligatory', 'name')
			->press('Guardar')
			->seeInDatabase('term_and_obligatories', [
				'name'    => 'Test to new term and obligatory',
				'default' => false
			]);
	}
	
	function test_create_term_and_obligatory_with_default_equals_true()
	{
		$this->visit('maintainers/terms-and-obligatories/create')
			->check('default')
			->type('Test to Second create term and obligatory', 'name')
			->press('Guardar')
			->seeInDatabase('term_and_obligatories', [
				'name'    => 'Test to Second create term and obligatory',
				'default' => true
			]);
	}
	
	function test_dont_see_default_true_in_database_when_is_save_with_false()
	{
		$this->visit('maintainers/terms-and-obligatories/create')
			->type('Test with default equals false', 'name')
			->press('Guardar')
			->dontSeeInDatabase('term_and_obligatories', [
				'name'    => 'Test with default equals false',
				'default' => true
			]);
	}
	
	function test_edit_term_and_obligatory()
	{
		$method = $this->term->default ? 'seeIsChecked' : 'dontSeeIsChecked';
		
		$this->visit('maintainers/terms-and-obligatories/' . $this->term->id . '/edit')
			->see('Editar Cláusula y Obligación: <span class="text-primary">' . $this->term->id . '</span>')
			->seeInField('name', $this->term->name)
			->$method('default')
			->assertResponseOk();
	}
	
	function test_dont_save_term_and_obligatory_when_name_is_empty()
	{
		$this->visit('maintainers/terms-and-obligatories/create')
			->type('', 'name')
			->press('Guardar')
			->dontSeeInDatabase('term_and_obligatories', [
				'name'    => '',
				'default' => false
			])
			->assertResponseOk();
	}
	
	function test_edit_name_in_term_and_obligatory()
	{
		$default = $this->term->default ? true : false;
		
		$this->visit('maintainers/terms-and-obligatories/' . $this->term->id . '/edit')
			->type('New text name for Term and Obligatory', 'name')
			->press('Actualizar')
			->seeInDatabase('term_and_obligatories', [
				'id'      => $this->term->id,
				'name'    => 'New text name for Term and Obligatory',
				'default' => $default
			]);
	}
	
	function test_edit_default_in_term_and_obligatory()
	{
		$this->visit('maintainers/terms-and-obligatories/' . $this->term->id . '/edit')
			->check('default')
			->press('Actualizar')
			->seeInDatabase('term_and_obligatories', [
				'id'      => $this->term->id,
				'name'    => $this->term->name,
				'default' => true
			]);
	}
	
	function test_delete_term_and_obligatory()
	{
		$this->delete('maintainers/terms-and-obligatories/' . $this->term->id)
			->dontSeeInDatabase('term_and_obligatories', [
				'id'         => $this->term->id,
				'name'       => $this->term->name,
				'default'    => $this->term->default,
				'deleted_at' => null
			]);
	}
	
	function test_restore_term_and_obligatory()
	{
		$method = $this->term->default ? 'check' : 'uncheck';
		$this->term->delete();
		
		$this->visit('maintainers/terms-and-obligatories/create')
			->type($this->term->name, 'name')
			->$method('default')
			->press('Guardar')
			->seeInDatabase('term_and_obligatories', [
				'id'         => $this->term->id,
				'name'       => $this->term->name,
				'default'    => $this->term->default,
				'deleted_at' => null
			]);
	}
	
}
