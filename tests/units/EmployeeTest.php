<?php

use Controlqtime\Core\Entities\Employee;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_can_formatted_birthday()
	{
		$employee = factory(Employee::class)->create([
			'birthday' => '14-08-1993'
		]);
		
		$this->seeInDatabase('employees', [
			'id'       => $employee->id,
			'birthday' => '1993-08-14'
		]);
		
		$this->assertEquals('14-08-1993', $employee->birthday);
	}
	
	function test_can_set_formatted_rut_removing_points()
	{
		$employee = factory(Employee::class)->create([
			'rut' => '5.643.442-9'
		]);
		
		$this->seeInDatabase('employees', [
			'id'  => $employee->id,
			'rut' => '5643442-9'
		]);
	}
	
	function test_can_set_is_male_to_true()
	{
		$employee = factory(Employee::class)->create([
			'is_male' => 'M'
		]);
		
		$this->seeInDatabase('employees', [
			'id'      => $employee->id,
			'is_male' => true
		]);
	}
	
	function test_can_set_is_female_to_false()
	{
		$employee = factory(Employee::class)->create([
			'is_male' => 'F'
		]);
		
		$this->seeInDatabase('employees', [
			'id'      => $employee->id,
			'is_male' => false
		]);
	}
	
	function test_can_get_formatted_rut_adding_points()
	{
		$employee = factory(Employee::class)->create([
			'rut' => '13597942-2'
		]);
		
		/* @todo Added Show view */
		
	}
	
}
