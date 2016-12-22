<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CityDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $city;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->city = factory(\Controlqtime\Core\Entities\City::class)->create();
	}
	
	function test_delete_city()
	{
		$this->delete('maintainers/cities/' . $this->city->id)
			->dontSeeInDatabase('cities', [
				'id'         => $this->city->id,
				'deleted_at' => null
			]);
	}
}
