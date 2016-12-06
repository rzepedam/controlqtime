<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeContractCreateTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $typeContract;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeContract = Config::get('enums.type_contracts')['Plazo Fijo'];
	}
	
	function test_create_type_contract()
	{
		$this->visit('maintainers/type-contracts/create')
			->seeInElement('h1', 'Crear Nuevo Tipo de Contrato')
			->see('Tipo Contrato')
			->seeInElement('#name', $this->typeContract)
			->see('Nº Meses')
			->seeInElement('button', 'Guardar');
	}
	
	function test_store_type_contract()
	{
		$this->visit('maintainers/type-contracts/create')
			->select($this->typeContract, 'name')
			->type('10', 'dur')
			->press('Guardar')
			->seeInDatabase('type_contracts', [
				'name'       => $this->typeContract,
				'dur'        => 10,
				'full_name'  => '',         // Full name is '' becouse is completed in Javascript
				'deleted_at' => null
			]);
	}
	
}

