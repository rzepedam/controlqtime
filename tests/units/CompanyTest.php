<?php

use Controlqtime\Core\Entities\Company;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CompanyTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	/** @test */
	function scope_company()
	{
		$companyA = factory(Company::class)->states('enable')->create();
		$companyB = factory(Company::class)->states('disable')->create();
		
		$companyEnables = Company::enabled()->get();
		
		$this->assertTrue($companyEnables->contains($companyA));
		$this->assertFalse($companyEnables->contains($companyB));
	}
	
	/** @test */
	function can_formatted_rut_company()
	{
		$company = factory(Company::class)->create([
			'rut' => '6.639.112-4'
		]);
		
		$this->seeInDatabase('companies', [
			'id'  => $company->id,
			'rut' => '6639112-4'
		]);
	}
	
	/** @test */
	function get_rut_with_points_company()
	{
		$company = factory(Company::class)->create([
			'rut' => '6.639.112-4'
		]);
		
		$this->assertEquals('6.639.112-4', $company->rut);
	}
	
	/** @test */
	function can_formatted_start_act_company()
	{
		$company = factory(Company::class)->create([
			'start_act' => '01-12-1979'
		]);
		
		$this->seeInDatabase('companies', [
			'id'        => $company->id,
			'start_act' => '1979-12-01'
		]);
	}
	
	/** @test */
	function get_start_act_to_d_m_Y_company()
	{
		$company = factory(Company::class)->create([
			'start_act' => '01-12-1979'
		]);
		
		$this->assertEquals('01-12-1979', $company->start_act);
	}
	
	/** @test */
	function get_start_act_to_spanish_format_company()
	{
		$company = factory(Company::class)->create([
			'start_act' => '11-12-2016'
		]);
		
		$this->assertEquals('domingo 11 diciembre 2016', $company->start_act_to_spanish_format);
	}
	
	/** @test */
	function get_created_at_to_spanish_format_company()
	{
		$company = factory(Company::class)->create([
			'created_at' => '2016-12-11 20:50:18'
		]);
		
		$this->assertEquals('domingo 11 diciembre 2016 20:50:18', $company->created_at_to_spanish_format);
	}
}
