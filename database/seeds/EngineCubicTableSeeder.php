<?php

use Controlqtime\Core\Entities\EngineCubic;
use Illuminate\Database\Seeder;

class EngineCubicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('engine_cubics')->truncate();

        EngineCubic::create([
            'id'   => 1,
            'name' => 'Centímetros cúbicos',
            'acr'  => 'cc',
        ]);

        EngineCubic::create([
            'id'   => 2,
            'name' => 'Caballos de fuerza',
            'acr'  => 'hp',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
