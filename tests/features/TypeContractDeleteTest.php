<?php

use Controlqtime\Core\Entities\TypeContract;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeContractDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $typeContract;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeContract = factory(TypeContract::class)->create();
	}
	
	function test_delete_type_contract()
	{
		$this->delete('maintainers/type-contracts/' . $this->typeContract->id)
			->dontSeeInDatabase('type_contracts', [
				'id'         => $this->typeContract->id,
				'name'       => $this->typeContract->name,
				'dur'        => $this->typeContract->dur,
				'full_name'  => '',
				'deleted_at' => null
			]);
	}
	
	function test_restore_type_contract()
	{
		$this->typeContract->delete();
		
		$this->visit('maintainers/type-contracts/create')
			->select($this->typeContract->name, 'name')
			->type($this->typeContract->dur, 'dur')
			->press('Guardar')
			->seeInDatabase('type_contracts', [
				'id'         => $this->typeContract->id,
				'name'       => $this->typeContract->name,
				'dur'        => $this->typeContract->dur,
				'full_name'  => '',
				'deleted_at' => null
			]);
	}
	
}
