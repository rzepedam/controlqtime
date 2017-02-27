<?php

use Controlqtime\Core\Entities\PieceVehicle;
use Illuminate\Database\Seeder;

class PieceVehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('piece_vehicles')->truncate();

        PieceVehicle::create([
            'id'   => 1,
            'name' => 'Herramientas',
        ]);

        PieceVehicle::create([
            'id'   => 2,
            'name' => 'Rueda de Repuesto',
        ]);

        PieceVehicle::create([
            'id'   => 3,
            'name' => 'Gata',
        ]);

        PieceVehicle::create([
            'id'   => 4,
            'name' => 'Batería',
        ]);

        PieceVehicle::create([
            'id'   => 5,
            'name' => 'Triángulo de Seguridad',
        ]);

        PieceVehicle::create([
            'id'   => 6,
            'name' => 'Retrovisor',
        ]);

        PieceVehicle::create([
            'id'   => 7,
            'name' => 'Espejo Lateral Derecho',
        ]);

        PieceVehicle::create([
            'id'   => 8,
            'name' => 'Espejo Lateral Izquierdo',
        ]);

        PieceVehicle::create([
            'id'   => 9,
            'name' => 'Parabrisas Delantero',
        ]);

        PieceVehicle::create([
            'id'   => 10,
            'name' => 'Parabrisas Trasero',
        ]);

        PieceVehicle::create([
            'id'   => 11,
            'name' => 'Plumillas',
        ]);

        PieceVehicle::create([
            'id'   => 12,
            'name' => 'Asientos',
        ]);

        PieceVehicle::create([
            'id'   => 13,
            'name' => 'Faro Delantero Derecho',
        ]);

        PieceVehicle::create([
            'id'   => 14,
            'name' => 'Faro Delantero Izquierdo',
        ]);

        PieceVehicle::create([
            'id'   => 15,
            'name' => 'Neblinero Izquierdo',
        ]);

        PieceVehicle::create([
            'id'   => 16,
            'name' => 'Neblinero Derecho',
        ]);

        PieceVehicle::create([
            'id'   => 17,
            'name' => 'Luces Intermitentes Delanteras',
        ]);

        PieceVehicle::create([
            'id'   => 18,
            'name' => 'Luces Intermitentes Traseras',
        ]);

        PieceVehicle::create([
            'id'   => 19,
            'name' => 'Luces Estacionamiento',
        ]);

        PieceVehicle::create([
            'id'   => 20,
            'name' => 'Luces de Frenos',
        ]);

        PieceVehicle::create([
            'id'   => 21,
            'name' => 'Neumáticos',
        ]);

        PieceVehicle::create([
            'id'   => 22,
            'name' => 'Pintura',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
