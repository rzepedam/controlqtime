<?php

use Controlqtime\Core\Entities\LaborUnion;
use Illuminate\Database\Seeder;

class LaborUnionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('labor_unions')->truncate();

        LaborUnion::create([
            'id'   => 1,
            'name' => 'Sindicato de Trabajadores San Bernardo Asociados',
        ]);

        LaborUnion::create([
            'id'   => 2,
            'name' => 'Sindicato 1 Los Andes',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
