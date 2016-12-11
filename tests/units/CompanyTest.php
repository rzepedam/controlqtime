<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CompanyTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_can_formatted_rut()
	{
		$company = factory(\Controlqtime\Core\Entities\Company::class)->create([
			'rut' => '6.639.112-4'
		]);
		
		$this->seeInDatabase('companies', [
			'id'  => $company->id,
			'rut' => '6639112-4'
		]);
	}
	
	function test_can_formatted_start_act()
	{
		$company = factory(\Controlqtime\Core\Entities\Company::class)->create([
			'start_act' => '01-12-1979'
		]);
		
		$this->seeInDatabase('companies', [
			'id'        => $company->id,
			'start_act' => '1979-12-01'
		]);
	}
}
