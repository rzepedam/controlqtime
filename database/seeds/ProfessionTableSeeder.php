<?php

use Controlqtime\Core\Entities\Profession;
use Illuminate\Database\Seeder;

class ProfessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('professions')->truncate();

        Profession::create([
            'id'   => 1,
            'name' => 'Ingeniería Civil Industrial',
        ]);

        Profession::create([
            'id'   => 2,
            'name' => 'Derecho',
        ]);

        Profession::create([
            'id'   => 3,
            'name' => 'Ingeniería Informática',
        ]);

        Profession::create([
            'id'   => 4,
            'name' => 'Servicio Social',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
