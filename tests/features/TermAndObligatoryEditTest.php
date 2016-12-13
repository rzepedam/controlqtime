<?php

use Controlqtime\Core\Entities\TermAndObligatory;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TermAndObligatoryEditTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $term;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->term = factory(TermAndObligatory::class)->create();
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
	
	function test_dont_update_term_and_obligatory_when_name_is_empty()
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
	
	function test_update_name_in_term_and_obligatory()
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
	
	function test_update_default_in_term_and_obligatory()
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
