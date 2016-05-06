<?php

use Controlqtime\Core\Entities\Subsidiary;
use Illuminate\Database\Seeder;

class SubsidiaryTableSeeder extends Seeder
{
    public function run()
    {
        factory(Subsidiary::class, 50)->create();
    }
}
