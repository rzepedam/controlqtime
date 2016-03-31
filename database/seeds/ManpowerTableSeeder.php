<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ManpowerTableSeeder extends Seeder
{

    public function run()
    {
        factory(App\Manpower::class, 50)->create();
    }
}
