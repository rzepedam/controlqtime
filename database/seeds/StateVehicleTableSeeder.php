<?php

use Controlqtime\Core\Entities\StateVehicle;
use Illuminate\Database\Seeder;

class StateVehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('state_vehicles')->truncate();

        StateVehicle::create([
            'id'   => 1,
            'name' => 'Nuevo',
        ]);

        StateVehicle::create([
            'id'   => 2,
            'name' => 'Usado',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
