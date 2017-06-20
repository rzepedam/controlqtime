<?php

use Controlqtime\Core\Entities\Visit;
use Illuminate\Database\Seeder;

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
