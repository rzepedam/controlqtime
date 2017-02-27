<?php

use Controlqtime\Core\Entities\City;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('cities')->truncate();

        City::create([
            'id'         => 1,
            'country_id' => 1,
            'name'       => 'Buenos Aires',
        ]);

        City::create([
            'id'         => 2,
            'country_id' => 1,
            'name'       => 'Mendoza',
        ]);

        City::create([
            'id'         => 3,
            'country_id' => 1,
            'name'       => 'Rosario',
        ]);

        City::create([
            'id'         => 4,
            'country_id' => 1,
            'name'       => 'Bariloche',
        ]);

        City::create([
            'id'         => 5,
            'country_id' => 2,
            'name'       => 'Río de Janeiro',
        ]);

        City::create([
            'id'         => 6,
            'country_id' => 2,
            'name'       => 'Brasilia',
        ]);

        City::create([
            'id'         => 7,
            'country_id' => 2,
            'name'       => 'Belo Horizonte',
        ]);

        City::create([
            'id'         => 8,
            'country_id' => 2,
            'name'       => 'Porto Alegre',
        ]);

        City::create([
            'id'         => 9,
            'country_id' => 2,
            'name'       => 'Fortaleza',
        ]);

        City::create([
            'id'         => 10,
            'country_id' => 3,
            'name'       => 'Bogotá',
        ]);

        City::create([
            'id'         => 11,
            'country_id' => 3,
            'name'       => 'Medellín',
        ]);

        City::create([
            'id'         => 12,
            'country_id' => 3,
            'name'       => 'Cali',
        ]);

        City::create([
            'id'         => 13,
            'country_id' => 4,
            'name'       => 'Santiago',
        ]);

        City::create([
            'id'         => 14,
            'country_id' => 4,
            'name'       => 'Concepción',
        ]);

        City::create([
            'id'         => 15,
            'country_id' => 4,
            'name'       => 'Valparaíso',
        ]);

        City::create([
            'id'         => 16,
            'country_id' => 4,
            'name'       => 'Arica',
        ]);

        City::create([
            'id'         => 17,
            'country_id' => 5,
            'name'       => 'Guayaquil',
        ]);

        City::create([
            'id'         => 18,
            'country_id' => 5,
            'name'       => 'Quito',
        ]);

        City::create([
            'id'         => 19,
            'country_id' => 6,
            'name'       => 'Arequipa',
        ]);

        City::create([
            'id'         => 20,
            'country_id' => 6,
            'name'       => 'Chiclayo',
        ]);

        City::create([
            'id'         => 21,
            'country_id' => 6,
            'name'       => 'Lima',
        ]);

        City::create([
            'id'         => 22,
            'country_id' => 6,
            'name'       => 'Trujillo',
        ]);

        City::create([
            'id'         => 23,
            'country_id' => 7,
            'name'       => 'Asunción',
        ]);

        City::create([
            'id'         => 24,
            'country_id' => 7,
            'name'       => 'Salto',
        ]);

        City::create([
            'id'         => 25,
            'country_id' => 8,
            'name'       => 'Montevideo',
        ]);

        City::create([
            'id'         => 26,
            'country_id' => 8,
            'name'       => 'Punta del Este',
        ]);

        City::create([
            'id'         => 27,
            'country_id' => 8,
            'name'       => 'Paisandú',
        ]);

        City::create([
            'id'         => 28,
            'country_id' => 9,
            'name'       => 'Margarita',
        ]);

        City::create([
            'id'         => 29,
            'country_id' => 9,
            'name'       => 'Caracas',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
