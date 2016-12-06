<?php

use Controlqtime\Core\Entities\Trademark;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TrademarkEditTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $trademark;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->trademark = factory(Trademark::class)->create();
	}
	
	function test_edit_trademark()
	{
		$this->visit('maintainers/trademarks/' . $this->trademark->id . '/edit')
			->seeInElement('h1', 'Editar Marca: <span class="text-primary">' . $this->trademark->id . '</span>')
			->seeInField('#name', $this->trademark->name)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_trademark()
	{
		$this->visit('maintainers/trademarks/' . $this->trademark->id . '/edit')
			->type('test', 'name')
			->press('Actualizar')
			->seeInDatabase('trademarks', [
				'id'         => $this->trademark->id,
				'name'       => 'test',
				'deleted_at' => null
			]);
	}
}
