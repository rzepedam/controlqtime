<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\Visit;

class VisitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('visits')->truncate();
        factory(Visit::class, 50)->create();
    }
}
