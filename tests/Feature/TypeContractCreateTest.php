<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeContractCreateTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $typeContract;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeContract = Config::get('enums.type_contracts')['Plazo Fijo'];
	}
	
	/** @test */
	function create_type_contract()
	{
		$this->visit('maintainers/type-contracts/create')
			->seeInElement('h1', 'Crear Nuevo Tipo de Contrato')
			->see('Tipo Contrato')
			->seeInElement('#name', $this->typeContract)
			->see('Nº Meses')
			->seeInElement('button', 'Guardar');
	}
	
	/** @test */
	function store_type_contract()
	{
		$this->visit('maintainers/type-contracts/create')
			->select($this->typeContract, 'name')
			->type('10', 'dur')
			->press('Guardar')
			->seeInDatabase('type_contracts', [
				'name'       => $this->typeContract,
				'dur'        => 10,
				'full_name'  => null,
			]);
	}
	
}

