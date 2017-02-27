<?php

use Controlqtime\Core\Entities\TypeDisability;
use Illuminate\Database\Seeder;

class TypeDisabilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('type_disabilities')->truncate();

        TypeDisability::create([
            'id'   => 1,
            'name' => 'Lesión Medular',
        ]);

        TypeDisability::create([
            'id'   => 2,
            'name' => 'Esclerosis Múltiple',
        ]);

        TypeDisability::create([
            'id'   => 3,
            'name' => 'Paralisis Cerebral',
        ]);

        TypeDisability::create([
            'id'   => 4,
            'name' => 'Mal de Parkinson',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
