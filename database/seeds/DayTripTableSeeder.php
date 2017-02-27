<?php

use Controlqtime\Core\Entities\DayTrip;
use Illuminate\Database\Seeder;

class DayTripTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('day_trips')->truncate();

        DayTrip::create([
            'id'   => 1,
            'name' => 'Lunes a Viernes',
        ]);

        DayTrip::create([
            'id'   => 2,
            'name' => 'Lunes a Sábado',
        ]);

        DayTrip::create([
            'id'   => 3,
            'name' => 'Sábados y Domingo',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
