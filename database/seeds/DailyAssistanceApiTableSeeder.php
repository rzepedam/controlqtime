<?php

use Controlqtime\Core\Api\Entities\DailyAssistanceApi;
use Illuminate\Database\Seeder;

class DailyAssistanceApiTableSeeder extends Seeder
{
    public function run()
    {
		DB::table('daily_assistance_apis')->truncate();

		factory(DailyAssistanceApi::class, 2000)->create();
    }
}
