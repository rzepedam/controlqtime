<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('devices')->truncate();

        \Controlqtime\Core\Entities\Device::create([
    		'name' => 'DDFF4EC6-182B-4E37-961D-28211D63E45B'
    	]);

    	\Controlqtime\Core\Entities\Device::create([
    		'name' => '06787B04-2454-4896-ACEB-D459610C4E61'
    	]);
    }
}
