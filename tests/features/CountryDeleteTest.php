<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CountryDeleteTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $country;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->country = factory(\Controlqtime\Core\Entities\Country::class)->create();
	}
	
	function test_delete_country()
	{
		$this->delete('maintainers/countries/' . $this->country->id)
			->dontSeeInDatabase('countries', [
				'id'         => $this->country->id,
				'deleted_at' => null
			]);
	}
}
