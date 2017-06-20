<?php

use Controlqtime\Core\Entities\TypeVisit;
use Illuminate\Database\Seeder;

class TypeVisitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_visits')->truncate();

        TypeVisit::create([
            'name' => 'Autoridades',
        ]);

        TypeVisit::create([
            'name' => 'Representante de Proveedor Nacional',
        ]);

        TypeVisit::create([
            'name' => 'Representante de Proveedor Extranjero (vendors)',
        ]);

        TypeVisit::create([
            'name' => 'Transportistas de Cargas/Equipos',
        ]);

        TypeVisit::create([
            'name' => 'Visitas Generales',
        ]);
    }
}
