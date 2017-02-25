<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class RouteWithTrashedTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $route;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->route = factory(\Controlqtime\Core\Entities\Route::class)->create();
	}
	
	function test_edit_route_when_terminal_is_deleted()
	{
		$this->delete('maintainers/terminals/' . $this->route->terminal->id);
		
		$this->visit('maintainers/routes/' . $this->route->id . '/edit')
			->seeInField('name', $this->route->name)
			->seeInElement('#terminal_id', 'Seleccione Terminal...');
	}
}
