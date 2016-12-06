<?php

use Controlqtime\Core\Entities\Region;
use Controlqtime\Core\Entities\Commune;
use Controlqtime\Core\Entities\Province;
use Controlqtime\Core\Entities\Terminal;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DeleteTerminalTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $commune;
	
	protected $province;
	
	protected $region;
	
	protected $terminal;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->region   = factory(Region::class)->create();
		$this->province = factory(Province::class)->create();
		$this->commune  = factory(Commune::class)->create();
		$this->terminal = factory(Terminal::class)->create();
	}
	
	function test_delete_terminal()
	{
		$this->delete('maintainers/terminals/' . $this->terminal->id)
			->dontSeeInDatabase('terminals', [
				'id'         => $this->terminal->id,
				'name'       => $this->terminal->name,
				'address'    => $this->terminal->address,
				'commune_id' => $this->terminal->commune_id,
				'deleted_at' => null
			]);
	}
	
	function test_restore_terminal()
	{
		$this->terminal->delete();
		
		$this->visit('maintainers/terminals/create')
			->type($this->terminal->name, 'name')
			->type($this->terminal->address, 'address')
			->select($this->terminal->commune->province->region->id, 'region_id')
			->select($this->terminal->commune->province->id, 'province_id')
			->select($this->terminal->commune->id, 'commune_id')
			->press('Guardar')
			->seeInDatabase('terminals', [
				'id'         => $this->terminal->id,
				'name'       => $this->terminal->name,
				'address'    => $this->terminal->address,
				'commune_id' => $this->terminal->commune_id,
				'deleted_at' => null
			]);
	}
}
