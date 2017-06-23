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

        $employees = \Controlqtime\Core\Entities\Employee::all();
        foreach ($employees as $employee)
		{
			factory(Controlqtime\Core\Entities\Contract::class, 1)->create([
				'employee_id' => $employee->id
			]);
		}
    }
}
