<?php

use Controlqtime\Core\Entities\Region;
use Controlqtime\Core\Entities\Commune;
use Controlqtime\Core\Entities\Province;
use Controlqtime\Core\Entities\Terminal;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EditTerminalTest extends TestCase
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
	
	function test_edit_terminal()
	{
		$this->visit('maintainers/terminals/' . $this->terminal->id . '/edit')
			->seeInElement('h1', 'Editar Terminal: <span class="text-primary">' . $this->terminal->id . '</span>')
			->seeInField('#name', $this->terminal->name)
			->seeInField('#address', $this->terminal->address)
			->seeInElement('#region_id', $this->terminal->commune->province->region->id)
			->seeInElement('#province_id', $this->terminal->commune->province->id)
			->seeInElement('#commune_id', $this->terminal->commune_id)
			->seeInElement('button', 'Actualizar');
	}
	
	function test_update_terminal()
	{
		$idRegion   = $this->region->id + 1;
		$idProvince = $this->province->id + 1;
		$idCommune  = $this->commune->id + 1;
		
		$region = factory(Region::class)->create([
			'id'   => $idRegion,
			'name' => 'Región B'
		]);
		
		$province = factory(Province::class)->create([
			'id'        => $idProvince,
			'name'      => 'Province B',
			'region_id' => $idRegion
		]);
		
		$commune = factory(Commune::class)->create([
			'id'          => $idCommune,
			'name'        => 'Comuna B',
			'province_id' => $idProvince
		]);
		
		$this->visit('maintainers/terminals/' . $this->terminal->id . '/edit')
			->type('test', 'name')
			->type('test', 'address')
			->select($region->id, 'region_id')
			->select($province->id, 'province_id')
			->select($commune->id, 'commune_id')
			->press('Actualizar')
			->seeInDatabase('terminals', [
				'id'         => $this->terminal->id,
				'name'       => 'test',
				'address'    => 'test',
				'commune_id' => $commune->id,
				'deleted_at' => null
			]);
	}
}
