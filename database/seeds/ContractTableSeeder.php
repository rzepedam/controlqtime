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

		factory(Controlqtime\Core\Entities\Contract::class)->create([
			'employee_id' 	=> 1,
			'company_id' 	=> 1,
			'area_id' 		=> 1
		]);
    }
}
