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
	
	function test_route_exists()
	{
		$this->visitRoute('terms-and-obligatories.index')
			->assertResponseOk();
	}
	
	function test_index_url_term_and_obligatory()
	{
		$this->visit('maintainers/terms-and-obligatories')
			->see('Listado de Cláusulas y Obligaciones')
			->assertResponseOk();
	}
	
	function test_create_new_term_and_obligatory_with_default_equals_false()
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
	
	function test_create_new_term_and_obligatory_with_default_equals_true()
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
	
	function test_edit_url_term_and_obligatory()
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
	
}
