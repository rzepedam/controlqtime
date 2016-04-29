<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ManpowerTableSeeder extends Seeder
{

    public function run()
    {
        factory(Controlqtime\Manpower::class, 3)->create();
    }
}
