<?php

use Controlqtime\Core\Api\Entities\AccessControlApi;
use Illuminate\Database\Seeder;

class AccessControlApiTableSeeder extends Seeder
{
    public function run()
    {
        if (getenv('APP_ENV') === 'local') {
            DB::table('access_control_apis')->truncate();
            factory(AccessControlApi::class, 10)->create();
        }
    }
}
