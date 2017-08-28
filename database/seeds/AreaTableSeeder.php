<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\Area;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('areas')->truncate();

        Area::create([
            'terminal_id' => 1,
            'name'        => 'COF',
        ]);

        Area::create([
            'terminal_id' => 1,
            'name'        => 'Mantención',
        ]);

        Area::create([
            'terminal_id' => 1,
            'name'        => 'Gerencia',
        ]);
    }
}
