<?php

use Controlqtime\Core\Entities\TypeSpeciality;
use Illuminate\Database\Seeder;

class TypeSpecialityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('type_specialities')->truncate();

        TypeSpeciality::create([
            'id'   => 1,
            'name' => 'Administración',
        ]);

        TypeSpeciality::create([
            'id'   => 2,
            'name' => 'Mecánica automotriz',
        ]);

        TypeSpeciality::create([
            'id'   => 3,
            'name' => 'Muebles y terminaciones de la madera',
        ]);

        TypeSpeciality::create([
            'id'   => 4,
            'name' => 'Vestuario y confección textil',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
