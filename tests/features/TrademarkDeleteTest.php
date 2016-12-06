<?php

use Controlqtime\Core\Entities\Trademark;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TrademarkDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $trademark;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->trademark = factory(Trademark::class)->create();
	}
	
	function test_delete_trademark()
	{
		$this->delete('maintainers/trademarks/' . $this->trademark->id)
			->dontSeeInDatabase('trademarks', [
				'id'         => $this->trademark->id,
				'name'       => $this->trademark->name,
				'deleted_at' => null
			]);
	}
	
	function test_restore_trademark()
	{
		$this->trademark->delete();
		
		$this->visit('maintainers/trademarks/create')
			->type($this->trademark->name, 'name')
			->press('Guardar')
			->seeInDatabase('trademarks', [
				'id'         => $this->trademark->id,
				'name'       => $this->trademark->name,
				'deleted_at' => null
			]);
	}
}
