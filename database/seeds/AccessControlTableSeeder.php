<?php

use Controlqtime\Core\Api\Entities\AccessControl;
use Illuminate\Database\Seeder;

class AccessControlTableSeeder extends Seeder
{
    public function run()
    {
        factory(AccessControl::class, 50)->create();
    }
}
