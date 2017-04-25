<?php

use Controlqtime\Core\Entities\TypeVehicle;
use Illuminate\Database\Seeder;

class TypeVehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_vehicles')->truncate();

        TypeVehicle::create([
            'id'              => 1,
            'name'            => 'Auto',
            'engine_cubic_id' => 1,
            'weight_id'       => 1,
        ]);

        TypeVehicle::create([
            'id'              => 2,
            'name'            => 'Bus',
            'engine_cubic_id' => 2,
            'weight_id'       => 2,
        ]);

        TypeVehicle::create([
            'id'              => 3,
            'name'            => 'Moto',
            'engine_cubic_id' => 1,
            'weight_id'       => 1,
        ]);
    }
}
