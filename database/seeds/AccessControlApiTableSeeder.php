<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Api\Entities\AccessControlApi;

class AccessControlApiTableSeeder extends Seeder
{
    public function run()
    {
	    if (getenv('APP_ENV') === 'local')
	    {
		    DB::table('access_control_apis')->truncate();
		    factory(AccessControlApi::class, 10)->create();
	    }
    }
}
