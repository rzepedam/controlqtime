<?php

use Controlqtime\Core\Entities\Nationality;
use Illuminate\Database\Seeder;

class NationalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('nationalities')->truncate();

        Nationality::create([
            'id'   => 1,
            'name' => 'Argentina',
        ]);

        Nationality::create([
            'id'   => 2,
            'name' => 'Bolivia',
        ]);

        Nationality::create([
            'id'   => 3,
            'name' => 'Colombia',
        ]);

        Nationality::create([
            'id'   => 4,
            'name' => 'Chile',
        ]);

        Nationality::create([
            'id'   => 5,
            'name' => 'Ecuador',
        ]);

        Nationality::create([
            'id'   => 6,
            'name' => 'Perú',
        ]);

        Nationality::create([
            'id'   => 7,
            'name' => 'Paraguay',
        ]);

        Nationality::create([
            'id'   => 8,
            'name' => 'Uruguay',
        ]);

        Nationality::create([
            'id'   => 9,
            'name' => 'Venezuela',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
