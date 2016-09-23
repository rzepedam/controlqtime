<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Api\Entities\AccessControlApi;

class AccessControlApiTableSeeder extends Seeder
{
    public function run()
    {
        factory(AccessControlApi::class, 50)->create();
    }
}
