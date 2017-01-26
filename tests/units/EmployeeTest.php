<?php

use Carbon\Carbon;
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
	
	/** @test */
	function can_formatted_birthday_employee()
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
	
	/** @test */
	function can_formatted_rut_removing_points_employee()
	{
		$employee = factory(Employee::class)->create([
			'rut' => '5.643.442-9'
		]);
		
		$this->seeInDatabase('employees', [
			'id'  => $employee->id,
			'rut' => '5643442-9'
		]);
	}
	
	/** @test */
	function can_is_male_to_true_employee()
	{
		$employee = factory(Employee::class)->create([
			'is_male' => 'M'
		]);
		
		$this->seeInDatabase('employees', [
			'id'      => $employee->id,
			'is_male' => true
		]);
	}
	
	/** @test */
	function can_is_female_to_false_employee()
	{
		$employee = factory(Employee::class)->create([
			'is_male' => 'F'
		]);
		
		$this->seeInDatabase('employees', [
			'id'      => $employee->id,
			'is_male' => false
		]);
	}
	
	/** @test */
	function get_formatted_rut_adding_points_employee()
	{
		$employee = factory(Employee::class)->create([
			'rut' => '13597942-2'
		]);
		
		$this->assertEquals('13.597.942-2', $employee->rut);
	}
	
	/** @test */
	function get_age_employee()
	{
		$employee = factory(\Controlqtime\Core\Entities\Employee::class)->create([
			'birthday' => '11-06-1989',
		]);
		
		$this->assertEquals('27', $employee->age);
	}
	
	/** @test */
	function get_birthday_to_spanish_format_employee()
	{
		$employee = factory(\Controlqtime\Core\Entities\Employee::class)->create([
			'birthday' => '11-06-1989',
		]);
		
		$this->assertEquals('domingo 11 junio 1989', $employee->birthday_to_spanish_format);
	}
	
	/** @test */
	function get_created_at_to_spanish_format_employee()
	{
		$employee = factory(\Controlqtime\Core\Entities\Employee::class)->create([
			'created_at' => '2016-12-12 09:13:21',
		]);
		
		$this->assertEquals('lunes 12 diciembre 2016 09:13:21', $employee->created_at_to_spanish_format);
	}
	
	/** @test */
	function get_updated_at_to_spanish_format_employee()
	{
		$employee = factory(\Controlqtime\Core\Entities\Employee::class)->create([
			'created_at' => '2016-12-12 09:13:21'
		]);
		
		$this->assertEquals('lunes 12 diciembre 2016 09:13:21', $employee->created_at_to_spanish_format);
	}
	
	/** @test */
	function get_is_male_true_for_edit_view_employee()
	{
		$employee = factory(\Controlqtime\Core\Entities\Employee::class)->create([
			'is_male' => 'M'
		]);
		
		$this->assertEquals(true, $employee->is_male_edit);
	}
	
	/** @test */
	function get_is_male_false_for_edit_view_employee()
	{
		$employee = factory(\Controlqtime\Core\Entities\Employee::class)->create([
			'is_male' => 'F'
		]);
		
		$this->assertEquals(false, $employee->is_male_edit);
	}
	
	private function seederCreatedAtForDailyAssistances()
	{
		$createdAt = [
			Carbon::parse("2017-01-01 08:33:02"), Carbon::parse("2017-01-01 18:56:00"),
			Carbon::parse('2017-01-02 09:18:45'), Carbon::parse('2017-01-02 21:23:09'),
			Carbon::parse('2017-01-03 08:50:10'), Carbon::parse('2017-01-03 17:00:09'),
			Carbon::parse('2017-01-04 09:24:07'), Carbon::parse('2017-01-04 18:02:10'),
			Carbon::parse('2017-01-05 08:47:56'), Carbon::parse('2017-01-05 17:59:38'),
			Carbon::parse('2017-01-07 09:31:17'), Carbon::parse('2017-01-07 20:31:02'),
			Carbon::parse('2017-01-08 08:40:38'), Carbon::parse('2017-01-08 18:05:28'),
			Carbon::parse('2017-01-09 10:37:06'), Carbon::parse('2017-01-09 18:13:30'),
		];
		
		$contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'employee_id' => factory(Employee::class)->states('enable')->create()->id,
			'day_trip_id' => factory(\Controlqtime\Core\Entities\DayTrip::class)->create(['name' => 'Lunes a Viernes'])->id
		]);
		
		for ( $i = 0; $i < count($createdAt); $i++ )
		{
			factory(\Controlqtime\Core\Api\Entities\DailyAssistanceApi::class)->create([
				'employee_id' => $contract->employee->id,
				'rut'         => $contract->employee->rut,
				'created_at'  => $createdAt[$i]
			]);
		}
		
		return $contract;
	}
	
	/**
	 * @param \Controlqtime\Core\Entities\Contract $contract
	 *
	 * @return mixed
	 */
	private function groupByDailyAssistances($contract)
	{
		$dailyAssistance = $contract->employee->dailyAssistances()
			->whereBetween('created_at', [config('constants.init_month'), config('constants.end_month')])
			->get()
			->groupBy(function ($item)
			{
				return Carbon::parse($item->created_at)->format('d');
			});
		
		return $dailyAssistance;
	}
	
	/** @test */
	function days_worked_in_the_month()
	{
		$assistance       = collect();
		$realAssistance   = collect();
		$contract         = $this->seederCreatedAtForDailyAssistances();
		$dailyAssistances = $this->groupByDailyAssistances($contract);
		$initMonth        = config('constants.init_month');
		$endMonth         = config('constants.end_month');
		
		if ( $contract->dayTrip->name === 'Lunes a viernes' )
		{
			$dailyAssistances->transform(function ($item) use ($assistance)
			{
				$assistance[] = Carbon::parse($item->min('created_at'))->format('Y-m-d');
			});
			
			while ( $endMonth >= $initMonth )
			{
				if ( $initMonth->isWeekday() )
				{
					if ( $assistance->contains($initMonth->format('Y-m-d')) )
					{
						$realAssistance[] = 1;
					}
				}
				
				$initMonth->addDay();
			}
		}
		
		$this->assertEquals(5, $realAssistance->sum());
	}
	
	/** @test */
	function days_non_assistance_in_the_month()
	{
		$assistance       = collect();
		$nonAssistance    = collect();
		$initMonth        = config('constants.init_month');
		$now              = config('constants.end_month');
		$contract         = $this->seederCreatedAtForDailyAssistances();
		$dailyAssistances = $this->groupByDailyAssistances($contract);
		
		if ( $contract->dayTrip->name === 'Lunes a viernes' )
		{
			$dailyAssistances->transform(function ($item) use ($assistance)
			{
				$assistance[] = Carbon::parse($item->min('created_at'))->format('Y-m-d');
			});
			
			while ( $now >= $initMonth )
			{
				if ( $initMonth->isWeekday() )
				{
					if ( ! $assistance->contains($initMonth->format('Y-m-d')) )
					{
						$nonAssistance[] = 1;
					}
				}
				
				$initMonth->addDay();
			}
		}
		
		$this->assertEquals(14, $nonAssistance->sum());
	}
	
	/** @test */
	function days_delays_in_the_month()
	{
		$assistance       = collect();
		$delays           = collect();
		$contract         = $this->seederCreatedAtForDailyAssistances();
		$dailyAssistances = $this->groupByDailyAssistances($contract);
		
		if ( $contract->dayTrip->name === 'Lunes a viernes' )
		{
			$dailyAssistances->transform(function ($item) use ($assistance)
			{
				$assistance[] = Carbon::parse($item->min('created_at'))->format('H:i:s');
			});
			
			$assistance->each(function ($item) use ($delays)
			{
				if ( $item > config('constants.time_limit') )
				{
					$delays[] = 1;
				}
			});
		}
		
		$this->assertEquals(2, $delays->count());
	}
	
	/** @test */
	function days_extra_hour_in_the_month()
	{
		$extraHours       = collect();
		$contract         = $this->seederCreatedAtForDailyAssistances();
		$dailyAssistances = $this->groupByDailyAssistances($contract);
		
		$dailyAssistances->transform(function ($item) use ($contract, $extraHours)
		{
			$maxAssistance = Carbon::parse($item->max('created_at'));
			$workOut       = Carbon::createFromFormat('Y-m-d H:i', $maxAssistance->format('Y-m-d') . " $contract->end_afternoon");
			
			if ( $maxAssistance > $workOut )
			{
				$extraHours[] = $maxAssistance->diffInHours($workOut);
			}
		});
		
		$this->assertEquals(3, $extraHours->sum());
	}
}
