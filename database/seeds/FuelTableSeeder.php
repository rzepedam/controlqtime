<?php

use Controlqtime\Core\Entities\Fuel;
use Illuminate\Database\Seeder;

class FuelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('fuels')->truncate();

        Fuel::create([
            'id'          => 1,
            'name'        => 'Diesel',
        ]);

        Fuel::create([
            'id'          => 2,
            'name'        => '93',
        ]);

        Fuel::create([
            'id'          => 3,
            'name'        => '95',
        ]);

        Fuel::create([
            'id'          => 4,
            'name'        => '97',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
