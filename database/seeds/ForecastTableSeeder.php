<?php

use Controlqtime\Core\Entities\Forecast;
use Illuminate\Database\Seeder;

class ForecastTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('forecasts')->truncate();

        Forecast::create([
            'id'   => 1,
            'name' => 'Banmédica S.A',
        ]);

        Forecast::create([
            'id'   => 2,
            'name' => 'Chuquicamata Ltda.',
        ]);

        Forecast::create([
            'id'   => 3,
            'name' => 'Colmena Golden Cross',
        ]);

        Forecast::create([
            'id'   => 4,
            'name' => 'Consalud',
        ]);

        Forecast::create([
            'id'   => 5,
            'name' => 'Cruz Blanca',
        ]);

        Forecast::create([
            'id'   => 6,
            'name' => 'Cruz del Norte',
        ]);

        Forecast::create([
            'id'   => 7,
            'name' => 'Fonasa',
        ]);

        Forecast::create([
            'id'   => 8,
            'name' => 'Fundación Ltda.',
        ]);

        Forecast::create([
            'id'   => 9,
            'name' => 'Fusat Ltda.',
        ]);

        Forecast::create([
            'id'   => 10,
            'name' => 'Masvida S.A',
        ]);

        Forecast::create([
            'id'   => 11,
            'name' => 'Óptima S.A',
        ]);

        Forecast::create([
            'id'   => 12,
            'name' => 'Río Blanco Ltda.',
        ]);

        Forecast::create([
            'id'   => 13,
            'name' => 'San Lorenzo Ltda.',
        ]);

        Forecast::create([
            'id'   => 14,
            'name' => 'Vida Tres S.A',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
