<?php

use Controlqtime\Core\Entities\TypeContract;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeContractTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $typeContract;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeContract = factory(TypeContract::class)->create();
	}
	
	function test_type_contract_url()
	{
		$this->visit('/maintainers/type-contracts')
			->see('Listado de Tipos de Contrato')
			->assertResponseOk();
	}
	
	function test_type_contract_route()
	{
		$this->visitRoute('type-contracts.index')
			->assertResponseOk();
	}
	
	function test_create_new_type_contract_plazo_fijo()
	{
		$this->visit('maintainers/type-contracts/create')
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
		$this->visit('/maintainers/type-contracts/create')
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
		$this->visit('/maintainers/type-contracts/create')
			->select('Indefinido', 'name')
			->press('Guardar')
			->seeInDatabase('type_contracts', [
				'name' => 'Indefinido',
				'dur'  => 0
			]);
	}
	
	function test_edit_url_type_contract()
	{
		$this->visit('/maintainers/type-contracts/' . $this->typeContract->id . '/edit')
			->see('Editar Tipo Contrato: <span class="text-primary">' . $this->typeContract->id . '</span>')
			->assertResponseStatus(200);
	}
	
	function test_see_correct_default_values_in_edit()
	{
		$this->visit('/maintainers/type-contracts/' . $this->typeContract->id . '/edit')
			->select($this->typeContract->name, 'name')
			->seeInField('dur', $this->typeContract->dur)
			->assertResponseOk();
	}
	
}
