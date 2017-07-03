<?php

use Illuminate\Database\Seeder;

class PeriodEveryEightHourTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		\Controlqtime\Core\Entities\PeriodEveryEightHour::create([
			'begin' => '00:00:00',
			'end' => '07:59:59'
		]);

		\Controlqtime\Core\Entities\PeriodEveryEightHour::create([
			'begin' => '08:00:00',
			'end' => '15:59:59'
		]);

		\Controlqtime\Core\Entities\PeriodEveryEightHour::create([
			'begin' => '16:00:00',
			'end' => '23:59:59'
		]);
    }
}
