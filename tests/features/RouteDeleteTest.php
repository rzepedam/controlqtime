<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $route;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->route = factory(\Controlqtime\Core\Entities\Route::class)->create();
	}
	
	function test_delete_route()
	{
		$this->delete('maintainers/routes/' . $this->route->id)
			->dontSeeInDatabase('routes', [
				'id'         => $this->route->id,
				'deleted_at' => null
			]);
	}
}
