<?php

use Controlqtime\Core\Entities\ModelVehicle;
use Illuminate\Database\Seeder;

class ModelVehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('model_vehicles')->truncate();

        ModelVehicle::create([
            'id'           => 1,
            'trademark_id' => 1,
            'name'         => 'Caio Foz',
        ]);

        ModelVehicle::create([
            'id'           => 2,
            'trademark_id' => 1,
            'name'         => 'Caio Mondego H',
        ]);

        ModelVehicle::create([
            'id'           => 3,
            'trademark_id' => 1,
            'name'         => 'Metalpar Tronador',
        ]);

        ModelVehicle::create([
            'id'           => 4,
            'trademark_id' => 2,
            'name'         => 'Marcopolo Viale BRS',
        ]);

        ModelVehicle::create([
            'id'           => 5,
            'trademark_id' => 2,
            'name'         => 'Caio Mondego',
        ]);

        ModelVehicle::create([
            'id'           => 6,
            'trademark_id' => 3,
            'name'         => 'Marcopolo Gran Viale LE',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
