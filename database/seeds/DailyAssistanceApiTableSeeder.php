<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Api\Entities\DailyAssistanceApi;

class DailyAssistanceApiTableSeeder extends Seeder
{
    public function run()
    {
	    if (getenv('APP_ENV') === 'local')
	    {
		    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		    DB::table('daily_assistance_apis')->truncate();
		
		    DailyAssistanceApi::create([
			    'employee_id' => 1,
			    'rut'         => '17032680-6',
			    'num_device'  => 'BC702909-E80E-4695-9790-E1DBCDF6F4EE',
			    'status'      => 0,
			    'created_at'  => '2017-01-01 08:54:39'
		    ]);
		
		    DailyAssistanceApi::create([
			    'employee_id' => 1,
			    'rut'         => '17032680-6',
			    'num_device'  => 'BC702909-E80E-4695-9790-E1DBCDF6F4EE',
			    'status'      => 0,
			    'created_at'  => '2017-01-01 17:58:40'
		    ]);
		
		    DailyAssistanceApi::create([
			    'employee_id' => 1,
			    'rut'         => '17032680-6',
			    'num_device'  => 'BC702909-E80E-4695-9790-E1DBCDF6F4EE',
			    'status'      => 1,
			    'created_at'  => '2017-01-02 08:55:32'
		    ]);
		
		    DailyAssistanceApi::create([
			    'employee_id' => 1,
			    'rut'         => '17032680-6',
			    'num_device'  => 'BC702909-E80E-4695-9790-E1DBCDF6F4EE',
			    'status'      => 0,
			    'created_at'  => '2017-01-02 20:21:02'
		    ]);
		
		    DailyAssistanceApi::create([
			    'employee_id' => 1,
			    'rut'         => '17032680-6',
			    'num_device'  => 'BC702909-E80E-4695-9790-E1DBCDF6F4EE',
			    'status'      => 1,
			    'created_at'  => '2017-01-03 09:21:00'
		    ]);
		
		    DailyAssistanceApi::create([
			    'employee_id' => 1,
			    'rut'         => '17032680-6',
			    'num_device'  => 'BC702909-E80E-4695-9790-E1DBCDF6F4EE',
			    'status'      => 0,
			    'created_at'  => '2017-01-03 17:57:09'
		    ]);
		
		    DailyAssistanceApi::create([
			    'employee_id' => 1,
			    'rut'         => '17032680-6',
			    'num_device'  => 'BC702909-E80E-4695-9790-E1DBCDF6F4EE',
			    'status'      => 1,
			    'created_at'  => '2017-01-04 07:53:19'
		    ]);
		
		    DailyAssistanceApi::create([
			    'employee_id' => 1,
			    'rut'         => '17032680-6',
			    'num_device'  => 'BC702909-E80E-4695-9790-E1DBCDF6F4EE',
			    'status'      => 0,
			    'created_at'  => '2017-01-04 19:55:00'
		    ]);
		
		    DailyAssistanceApi::create([
			    'employee_id' => 1,
			    'rut'         => '17032680-6',
			    'num_device'  => 'BC702909-E80E-4695-9790-E1DBCDF6F4EE',
			    'status'      => 1,
			    'created_at'  => '2017-01-05 11:34:46'
		    ]);
		
		    DailyAssistanceApi::create([
			    'employee_id' => 1,
			    'rut'         => '17032680-6',
			    'num_device'  => 'BC702909-E80E-4695-9790-E1DBCDF6F4EE',
			    'status'      => 1,
			    'created_at'  => '2017-01-05 18:01:58'
		    ]);
		
		    DailyAssistanceApi::create([
			    'employee_id' => 1,
			    'rut'         => '17032680-6',
			    'num_device'  => 'BC702909-E80E-4695-9790-E1DBCDF6F4EE',
			    'status'      => 1,
			    'created_at'  => '2017-01-06 08:58:04'
		    ]);
		
		    DailyAssistanceApi::create([
			    'employee_id' => 1,
			    'rut'         => '17032680-6',
			    'num_device'  => 'BC702909-E80E-4695-9790-E1DBCDF6F4EE',
			    'status'      => 1,
			    'created_at'  => '2017-01-06 17:55:18'
		    ]);
		
		    DailyAssistanceApi::create([
			    'employee_id' => 1,
			    'rut'         => '17032680-6',
			    'num_device'  => 'BC702909-E80E-4695-9790-E1DBCDF6F4EE',
			    'status'      => 1,
			    'created_at'  => '2017-01-07 08:59:10'
		    ]);
		
		    DailyAssistanceApi::create([
			    'employee_id' => 1,
			    'rut'         => '17032680-6',
			    'num_device'  => 'BC702909-E80E-4695-9790-E1DBCDF6F4EE',
			    'status'      => 1,
			    'created_at'  => '2017-01-07 18:02:45'
		    ]);
		
		    DailyAssistanceApi::create([
			    'employee_id' => 1,
			    'rut'         => '17032680-6',
			    'num_device'  => 'BC702909-E80E-4695-9790-E1DBCDF6F4EE',
			    'status'      => 0,
			    'created_at'  => '2017-01-08 09:15:15'
		    ]);
		
		    DailyAssistanceApi::create([
			    'employee_id' => 1,
			    'rut'         => '17032680-6',
			    'num_device'  => 'BC702909-E80E-4695-9790-E1DBCDF6F4EE',
			    'status'      => 0,
			    'created_at'  => '2017-01-08 20:15:00'
		    ]);
		
		    DailyAssistanceApi::create([
			    'employee_id' => 1,
			    'rut'         => '17032680-6',
			    'num_device'  => 'BC702909-E80E-4695-9790-E1DBCDF6F4EE',
			    'status'      => 0,
			    'created_at'  => '2017-01-09 10:18:00'
		    ]);
		
		    DailyAssistanceApi::create([
			    'employee_id' => 1,
			    'rut'         => '17032680-6',
			    'num_device'  => 'BC702909-E80E-4695-9790-E1DBCDF6F4EE',
			    'status'      => 1,
			    'created_at'  => '2017-01-09 18:01:56'
		    ]);
	    }
    }
}
