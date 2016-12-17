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
	
	function test_can_formatted_birthday_employee()
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
	
	function test_can_formatted_rut_removing_points_employee()
	{
		$employee = factory(Employee::class)->create([
			'rut' => '5.643.442-9'
		]);
		
		$this->seeInDatabase('employees', [
			'id'  => $employee->id,
			'rut' => '5643442-9'
		]);
	}
	
	function test_can_is_male_to_true_employee()
	{
		$employee = factory(Employee::class)->create([
			'is_male' => 'M'
		]);
		
		$this->seeInDatabase('employees', [
			'id'      => $employee->id,
			'is_male' => true
		]);
	}
	
	function test_can_is_female_to_false_employee()
	{
		$employee = factory(Employee::class)->create([
			'is_male' => 'F'
		]);
		
		$this->seeInDatabase('employees', [
			'id'      => $employee->id,
			'is_male' => false
		]);
	}
	
	function test_get_formatted_rut_adding_points_employee()
	{
		$employee = factory(Employee::class)->create([
			'rut' => '13597942-2'
		]);
		
		$this->assertEquals('13.597.942-2', $employee->rut);
	}
	
	function test_get_age_employee()
	{
		$employee = factory(\Controlqtime\Core\Entities\Employee::class)->create([
			'birthday' => '11-06-1989',
		]);
		
		$this->assertEquals('27', $employee->age);
	}
	
	function test_get_birthday_to_spanish_format_employee()
	{
		$employee = factory(\Controlqtime\Core\Entities\Employee::class)->create([
			'birthday' => '11-06-1989',
		]);
		
		$this->assertEquals('domingo 11 junio 1989', $employee->birthday_to_spanish_format);
	}
	
	function test_get_created_at_to_spanish_format_employee()
	{
		$employee = factory(\Controlqtime\Core\Entities\Employee::class)->create([
			'created_at' => '2016-12-12 09:13:21',
		]);
		
		$this->assertEquals('lunes 12 diciembre 2016 09:13:21', $employee->created_at_to_spanish_format);
	}
	
	function test_get_updated_at_to_spanish_format_employee()
	{
		$employee = factory(\Controlqtime\Core\Entities\Employee::class)->create([
			'created_at' => '2016-12-12 09:13:21'
		]);
		
		$this->assertEquals('lunes 12 diciembre 2016 09:13:21', $employee->created_at_to_spanish_format);
	}
	
	function test_get_is_male_true_for_edit_view_employee()
	{
		$employee = factory(\Controlqtime\Core\Entities\Employee::class)->create([
			'is_male' => 'M'
		]);
		
		$this->assertEquals(true, $employee->is_male_edit);
	}
	
	function test_get_is_male_false_for_edit_view_employee()
	{
		$employee = factory(\Controlqtime\Core\Entities\Employee::class)->create([
			'is_male' => 'F'
		]);
		
		$this->assertEquals(false, $employee->is_male_edit);
	}
	
}
