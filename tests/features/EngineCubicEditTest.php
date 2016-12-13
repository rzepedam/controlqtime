<?php

use Controlqtime\Core\Entities\EngineCubic;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EngineCubicEditTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $engineCubic;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->engineCubic = factory(EngineCubic::class)->create([
			'name' => 'Caballos de fuerza',
			'acr'  => 'hp'
		]);
	}
	
	function test_edit_engine_cubic()
	{
		$this->visit('maintainers/measuring-units/engine-cubics/' . $this->engineCubic->id . '/edit')
			->seeInField('#name', $this->engineCubic->name)
			->seeInField('#acr', $this->engineCubic->acr)
			->see('Actualizar');
	}
	
	function test_update_engine_cubic()
	{
		$this->visit('maintainers/measuring-units/engine-cubics/' . $this->engineCubic->id . '/edit')
			->type('test', 'name')
			->type('test', 'acr')
			->press('Actualizar')
			->seeInDatabase('engine_cubics', [
				'id'         => $this->engineCubic->id,
				'name'       => 'test',
				'acr'        => 'test',
				'deleted_at' => null
			]);
	}
}
