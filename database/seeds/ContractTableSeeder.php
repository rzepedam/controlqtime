<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContractTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contracts')->truncate();

        $employees 	= \Controlqtime\Core\Entities\Employee::all();
		$companies 	= \Controlqtime\Core\Entities\Company::with(['areas'])->get();

        foreach ($employees as $employee)
		{
			$company 	= $companies->random();
			$area 		= $company->areas->pluck('id')->random();
			factory(Controlqtime\Core\Entities\Contract::class, 1)->create([
				'employee_id' 	=> $employee->id,
				'company_id' 	=> $company->id,
				'area_id' 		=> $area
			]);
		}
    }
}
