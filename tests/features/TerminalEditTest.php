<?php

use Controlqtime\Core\Entities\Region;
use Controlqtime\Core\Entities\Commune;
use Controlqtime\Core\Entities\Province;
use Controlqtime\Core\Entities\Terminal;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TerminalEditTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $terminal;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
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
		$region = factory(Region::class)->create([
			'name' => 'Región B'
		]);
		
		$province = factory(Province::class)->create([
			'name'      => 'Province B',
			'region_id' => $region->id
		]);
		
		$commune = factory(Commune::class)->create([
			'name'        => 'Comuna B',
			'province_id' => $province->id
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
