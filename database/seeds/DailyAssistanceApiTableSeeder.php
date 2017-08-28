<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Api\Entities\DailyAssistanceApi;

class DailyAssistanceApiTableSeeder extends Seeder
{
    public function run()
    {
		DB::table('daily_assistance_apis')->truncate();

		$employees 	= \Controlqtime\Core\Entities\Employee::enabled()->get();

		foreach ($employees as $employee)
		{
			$init 		= \Carbon\Carbon::today()->subMonths(3);
			$end 		= \Carbon\Carbon::now();
			for ( $i = $init; $i <= $end; $i->addDay() )
			{
				$logIn = mt_rand(\Carbon\Carbon::parse($i)->timestamp, \Carbon\Carbon::parse($i->addHours(10))->timestamp);
    			$logInPeriod = \Carbon\Carbon::createFromFormat('U', $logIn)->setTimezone('America/Santiago')->format('Y-m-d H:i:s');
				
				if ($logInPeriod >= '00:00:00' && $logInPeriod <= '07:59:59') {
		        	$periodId = 1;
			    } elseif ($logInPeriod >= '08:00:00' && $logInPeriod <= '15:59:59') {
			        $periodId = 2;
			    } else {
			        $periodId = 3;
			    }

				// Genero nº para log_in y log_out o sólo log_in
				$random = rand(0,2);
				$logOut = null;
				if ($random % 2 == 0)
				{
					$logOut = \Carbon\Carbon::parse($logInPeriod)->addHours(9)->format('Y-m-d H:i:s');
				}

				\Controlqtime\Core\Api\Entities\DailyAssistanceApi::create([
					'employee_id' => $employee->id,
					'period_every_eight_hour_id' => $periodId, 
					'rut' => $employee->getOriginal('rut'), 
					'num_device' => '06787B04-2454-4896-ACEB-D459610C4E61', 
					'status' => 1, 
					'log_in' => $logInPeriod, 
					'log_out' => $logOut
				]);	
			}
		}
    }
}
