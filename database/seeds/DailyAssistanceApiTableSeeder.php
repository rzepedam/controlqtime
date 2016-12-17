<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Api\Entities\DailyAssistanceApi;

class DailyAssistanceApiTableSeeder extends Seeder
{
    public function run()
    {
	    if (getenv('APP_ENV') === 'local')
	    {
		    DB::table('daily_assistance_apis')->truncate();
		    factory(DailyAssistanceApi::class, 1)->create();
	    }
    }
}
