<?php

use Controlqtime\Core\Entities\TermAndObligatory;
use Controlqtime\Core\Entities\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TermAndObligatoryTest extends TestCase
{
	use DatabaseTransactions;
	
	public function test_route_exists()
	{
		$this->visitRoute('terms-and-obligatories.index')
			->assertResponseOk();
	}
	
	public function test_index_url_term_and_obligatory()
	{
		$user = User::first();
		
		$this->actingAs($user)
			->visit('maintainers/terms-and-obligatories')
			->see('Listado de Cláusulas y Obligaciones')
			->assertResponseOk();
	}
	
	public function test_create_new_term_and_obligatory_with_default_equals_false()
	{
		$user = User::first();
		
		$this->actingAs($user)
			->visit('maintainers/terms-and-obligatories/create')
			->see('Crear Nueva Cláusula y Obligación')
			->type('Test to new term and obligatory', 'name')
			->press('Guardar')
			->seeInDatabase('term_and_obligatories', [
				'name'    => 'Test to new term and obligatory',
				'default' => false
			]);
	}
	
	public function test_create_new_term_and_obligatory_with_default_equals_true()
	{
		$user = User::first();
		
		$this->actingAs($user)
			->visit('maintainers/terms-and-obligatories/create')
			->check('default')
			->type('Test to Second create term and obligatory', 'name')
			->press('Guardar')
			->seeInDatabase('term_and_obligatories', [
				'name'    => 'Test to Second create term and obligatory',
				'default' => true
			]);
	}
	
	public function test_dont_see_default_true_in_database_when_is_save_with_false()
	{
		$user = User::first();
		
		$this->actingAs($user)
			->visit('maintainers/terms-and-obligatories/create')
			->type('Test with default equals false', 'name')
			->press('Guardar')
			->dontSeeInDatabase('term_and_obligatories', [
				'name'    => 'Test with default equals false',
				'default' => true
			]);
	}
	
	public function test_edit_url_term_and_obligatory()
	{
		$user   = User::first();
		$term   = TermAndObligatory::first();
		$method = $term->default ? 'seeIsChecked' : 'dontSeeIsChecked';
		
		$this->actingAs($user)
			->visit('maintainers/terms-and-obligatories/' . $term->id . '/edit')
			->see('Editar Cláusula y Obligación: <span class="text-primary">' . $term->id . '</span>')
			->seeInField('name', $term->name)
			->$method('default')
			->assertResponseOk();
	}
	
	public function test_dont_save_term_and_obligatory_when_name_is_empty()
	{
		$user = User::first();
		
		$this->actingAs($user)
			->visit('maintainers/terms-and-obligatories/create')
			->type('', 'name')
			->press('Guardar')
			->dontSeeInDatabase('term_and_obligatories', [
				'name'    => '',
				'default' => false
			])
			->assertResponseOk();
	}
	
	public function test_edit_name_in_term_and_obligatory()
	{
		$user = User::first();
		$term = TermAndObligatory::first();
		$act  = $term->default ? true : false;
		
		$this->actingAs($user)
			->visit('maintainers/terms-and-obligatories/' . $term->id . '/edit')
			->type('New text name for Term and Obligatory', 'name')
			->press('Actualizar')
			->seeInDatabase('term_and_obligatories', [
				'id'      => $term->id,
				'name'    => 'New text name for Term and Obligatory',
				'default' => $act
			]);
	}
	
	public function test_edit_default_in_term_and_obligatory()
	{
		$user = User::first();
		$term = TermAndObligatory::first();
		
		$this->actingAs($user)
			->visit('maintainers/terms-and-obligatories/' . $term->id . '/edit')
			->check('default')
			->press('Actualizar')
			->seeInDatabase('term_and_obligatories', [
				'id'      => $term->id,
				'name'    => $term->name,
				'default' => true
			]);
	}
}
