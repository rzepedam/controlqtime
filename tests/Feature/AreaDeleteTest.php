<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class AreaDeleteTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $area;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->area = factory(\Controlqtime\Core\Entities\Area::class)->create();
	}
	
	function test_delete_area()
	{
		$this->delete('maintainers/areas/' . $this->area->id)
			->dontSeeInDatabase('areas', [
				'id'        => $this->area->id,
				'deleted_at' => null
			]);
	}
}
