<?php

use Controlqtime\Core\Entities\User;
use Controlqtime\Core\Entities\TypeContract;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeContractTest extends TestCase
{
	use DatabaseTransactions;
	
	function test_url_exists()
	{
		$user = User::first();
		
		$this->actingAs($user)
			->visit('/maintainers/type-contracts')
			->see('Listado de Tipos de Contrato')
			->assertResponseOk();
	}
	
	function test_route_exists()
	{
		$user = User::first();
		
		$this->actingAs($user)
			->visitRoute('type-contracts.index')
			->assertResponseOk();
	}
	
	function test_create_new_type_contract_plazo_fijo()
	{
		$user = User::first();
		
		$this->actingAs($user)
			->visit('maintainers/type-contracts/create')
			->see('Crear Nuevo Tipo de Contrato')
			->select('Plazo Fijo', 'name')
			->type('3', 'dur')
			->press('Guardar')
			->seeInDatabase('type_contracts', [
				'name' => 'Plazo Fijo',
				'dur'  => 3,
			]);
	}
	
	function test_dont_create_new_type_contract_plazo_fijo()
	{
		$user = User::first();
		
		$this->actingAs($user)
			->visit('/maintainers/type-contracts/create')
			->select('Plazo Fijo', 'name')
			->type('', 'dur')
			->press('Guardar')
			->dontSeeInDatabase('type_contracts', [
				'name' => 'Plazo Fijo',
				'dur'  => '',
			]);
	}
	
	function test_create_new_type_contract_indefinido()
	{
		$user = User::first();
		
		$this->actingAs($user)
			->visit('/maintainers/type-contracts/create')
			->select('Indefinido', 'name')
			->press('Guardar')
			->seeInDatabase('type_contracts', [
				'name' => 'Indefinido',
				'dur'  => 0
			]);
	}
	
	function test_dont_create_type_contract_indefinido()
	{
		$user = User::first();
		
		$this->actingAs($user)
			->visit('/maintainers/type-contracts/create')
			->select('Indefinido', 'name')
			->type('5', 'dur')
			->press('Guardar')
			->dontSeeInDatabase('type_contracts', [
				'name' => '',
				'dur'  => '5'
			]);
	}
	
	function test_edit_url_type_contract_exists()
	{
		$user         = User::first();
		$typeContract = TypeContract::first();
		
		$this->actingAs($user)
			->visit('/maintainers/type-contracts/' . $typeContract->id . '/edit')
			->see('Editar Tipo Contrato: <span class="text-primary">' . $typeContract->id . '</span>')
			->assertResponseStatus(200);
	}
	
	function test_see_correct_default_values_in_edit()
	{
		$user         = User::first();
		$typeContract = TypeContract::first();
		
		$this->actingAs($user)
			->visit('/maintainers/type-contracts/' . $typeContract->id . '/edit')
			->seeIsSelected('name', $typeContract->name)
			->seeInField('dur', $typeContract->dur)
			->assertResponseOk();
	}
	
}
