<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContractTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	/** @test */
	function save_init_morning_removing_two_points()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create();
		
		$this->seeInDatabase('contracts', [
			'id'           => $contract->id,
			'init_morning' => '0900'
		]);
	}
	
	/** @test */
	function get_init_morning_with_two_points()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'init_morning' => '0900'
		]);
		
		$this->assertEquals('09:00', $contract->init_morning);
	}
	
	/** @test */
	function save_end_morning_removing_two_points()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create();
		
		$this->seeInDatabase('contracts', [
			'id'          => $contract->id,
			'end_morning' => '1300'
		]);
	}
	
	/** @test */
	function get_end_morning_with_two_points()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'end_morning' => '1300'
		]);
		
		$this->assertEquals('13:00', $contract->end_morning);
	}
	
	/** @test */
	function save_init_afternoon_removing_two_points()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create();
		
		$this->seeInDatabase('contracts', [
			'id'             => $contract->id,
			'init_afternoon' => '1400'
		]);
	}
	
	/** @test */
	function get_init_afternoon_with_two_points()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'init_afternoon' => '1400'
		]);
		
		$this->assertEquals('14:00', $contract->init_afternoon);
	}
	
	/** @test */
	function save_end_afternoon_removing_two_points()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create();
		
		$this->seeInDatabase('contracts', [
			'id'            => $contract->id,
			'end_afternoon' => '1900'
		]);
	}
	
	/** @test */
	function get_end_afternoon_with_two_points()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'end_afternoon' => '1900'
		]);
		
		$this->assertEquals('19:00', $contract->end_afternoon);
	}
	
	/** @test */
	function get_created_at_to_spanish_format()
	{
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'created_at' => '2016-12-13'
		]);
		
		$this->assertEquals('martes 13 diciembre 2016', $contract->created_at_to_spanish_format);
	}
}
