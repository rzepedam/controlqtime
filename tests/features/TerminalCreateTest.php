<?php

use Controlqtime\Core\Entities\Region;
use Controlqtime\Core\Entities\Commune;
use Controlqtime\Core\Entities\Province;
use Controlqtime\Core\Entities\Terminal;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TerminalCreateTest extends TestCase
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
	
	function test_create_terminal()
	{
		$this->visit('maintainers/terminals/create')
			->seeInElement('h1', 'Crear Nuevo Terminal')
			->see('Nombre')
			->see('Dirección')
			->seeInElement('#region_id', $this->commune->province->region->name)
			->seeInElement('#province_id', $this->commune->province->name)
			->seeInElement('#commune_id', $this->commune->name);
	}
	
	function test_store_terminal()
	{
		$this->visit('maintainers/terminals/create')
			->type('test', 'name')
			->type('Los Alerces 1450', 'address')
			->select($this->region->id, 'region_id')
			->select($this->province->id, 'province_id')
			->select($this->commune->id, 'commune_id')
			->press('Guardar')
			->seeInDatabase('terminals', [
				'name'       => 'test',
				'address'    => 'Los Alerces 1450',
				'commune_id' => $this->commune->id,
				'deleted_at' => null
			]);
	}
}
