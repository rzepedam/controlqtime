<?php

use Controlqtime\Core\Entities\TypeContract;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeContractEditTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $typeContract;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeContract = factory(TypeContract::class)->create([
			'name' => 'Plazo Fijo'
		]);
	}
	
	function test_edit_type_contract()
	{
		$this->visit('maintainers/type-contracts/' . $this->typeContract->id . '/edit')
			->seeInElement('h1', 'Editar Tipo Contrato: <span class="text-primary">' . $this->typeContract->id . '</span>')
			->seeInElement('#name', $this->typeContract->name)
			->seeInField('#dur', $this->typeContract->dur)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_type_contract()
	{
		$this->visit('maintainers/type-contracts/' . $this->typeContract->id . '/edit')
			->select($this->typeContract->name, '#name')
			->type('24', 'dur')
			->press('Actualizar')
			->seeInDatabase('type_contracts', [
				'id'         => $this->typeContract->id,
				'name'       => 'Plazo Fijo',
				'dur'        => '24',
				'full_name'  => '',
				'deleted_at' => null
			]);
	}
}