<?php

use Controlqtime\Core\Entities\Province;
use Illuminate\Database\Seeder;

class ProvinceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('provinces')->truncate();

        Province::create([
            'id'        => 1,
            'region_id' => 1,
            'name'      => 'Arica',
        ]);

        Province::create([
            'id'        => 2,
            'region_id' => 1,
            'name'      => 'Parinacota',
        ]);

        Province::create([
            'id'        => 3,
            'region_id' => 2,
            'name'      => 'Iquique',
        ]);

        Province::create([
            'id'        => 4,
            'region_id' => 2,
            'name'      => 'El Tamarugal',
        ]);

        Province::create([
            'id'        => 5,
            'region_id' => 3,
            'name'      => 'Antofagasta',
        ]);

        Province::create([
            'id'        => 6,
            'region_id' => 3,
            'name'      => 'El Loa',
        ]);

        Province::create([
            'id'        => 7,
            'region_id' => 3,
            'name'      => 'Tocopilla',
        ]);

        Province::create([
            'id'        => 8,
            'region_id' => 4,
            'name'      => 'Chañaral',
        ]);

        Province::create([
            'id'        => 9,
            'region_id' => 4,
            'name'      => 'Copiapó',
        ]);

        Province::create([
            'id'        => 10,
            'region_id' => 4,
            'name'      => 'Huasco',
        ]);

        Province::create([
            'id'        => 11,
            'region_id' => 5,
            'name'      => 'Choapa',
        ]);

        Province::create([
            'id'        => 12,
            'region_id' => 5,
            'name'      => 'Elqui',
        ]);

        Province::create([
            'id'        => 13,
            'region_id' => 5,
            'name'      => 'Limarí',
        ]);

        Province::create([
            'id'        => 14,
            'region_id' => 6,
            'name'      => 'Isla de Pascua',
        ]);

        Province::create([
            'id'        => 15,
            'region_id' => 6,
            'name'      => 'Los Andes',
        ]);

        Province::create([
            'id'        => 16,
            'region_id' => 6,
            'name'      => 'Petorca',
        ]);

        Province::create([
            'id'        => 17,
            'region_id' => 6,
            'name'      => 'Quillota',
        ]);

        Province::create([
            'id'        => 18,
            'region_id' => 6,
            'name'      => 'San Antonio',
        ]);

        Province::create([
            'id'        => 19,
            'region_id' => 6,
            'name'      => 'San Felipe de Aconcagua',
        ]);

        Province::create([
            'id'        => 20,
            'region_id' => 6,
            'name'      => 'Valparaiso',
        ]);

        Province::create([
            'id'        => 21,
            'region_id' => 7,
            'name'      => 'Chacabuco',
        ]);

        Province::create([
            'id'        => 22,
            'region_id' => 7,
            'name'      => 'Cordillera',
        ]);

        Province::create([
            'id'        => 23,
            'region_id' => 7,
            'name'      => 'Maipo',
        ]);

        Province::create([
            'id'        => 24,
            'region_id' => 7,
            'name'      => 'Melipilla',
        ]);

        Province::create([
            'id'        => 25,
            'region_id' => 7,
            'name'      => 'Santiago',
        ]);

        Province::create([
            'id'        => 26,
            'region_id' => 7,
            'name'      => 'Talagante',
        ]);

        Province::create([
            'id'        => 27,
            'region_id' => 8,
            'name'      => 'Cachapoal',
        ]);

        Province::create([
            'id'        => 28,
            'region_id' => 8,
            'name'      => 'Cardenal Caro',
        ]);

        Province::create([
            'id'        => 29,
            'region_id' => 8,
            'name'      => 'Colchagua',
        ]);

        Province::create([
            'id'        => 30,
            'region_id' => 9,
            'name'      => 'Cauquenes',
        ]);

        Province::create([
            'id'        => 31,
            'region_id' => 9,
            'name'      => 'Curicó',
        ]);

        Province::create([
            'id'        => 32,
            'region_id' => 9,
            'name'      => 'Linares',
        ]);

        Province::create([
            'id'        => 33,
            'region_id' => 9,
            'name'      => 'Talca',
        ]);

        Province::create([
            'id'        => 34,
            'region_id' => 10,
            'name'      => 'Arauco',
        ]);

        Province::create([
            'id'        => 35,
            'region_id' => 10,
            'name'      => 'Bio Bío',
        ]);

        Province::create([
            'id'        => 36,
            'region_id' => 10,
            'name'      => 'Concepción',
        ]);

        Province::create([
            'id'        => 37,
            'region_id' => 10,
            'name'      => 'Ñuble',
        ]);

        Province::create([
            'id'        => 38,
            'region_id' => 11,
            'name'      => 'Cautín',
        ]);

        Province::create([
            'id'        => 39,
            'region_id' => 11,
            'name'      => 'Malleco',
        ]);

        Province::create([
            'id'        => 40,
            'region_id' => 12,
            'name'      => 'Valdivia',
        ]);

        Province::create([
            'id'        => 41,
            'region_id' => 12,
            'name'      => 'Ranco',
        ]);

        Province::create([
            'id'        => 42,
            'region_id' => 13,
            'name'      => 'Chiloé',
        ]);

        Province::create([
            'id'        => 43,
            'region_id' => 13,
            'name'      => 'Llanquihue',
        ]);

        Province::create([
            'id'        => 44,
            'region_id' => 13,
            'name'      => 'Osorno',
        ]);

        Province::create([
            'id'        => 45,
            'region_id' => 13,
            'name'      => 'Palena',
        ]);

        Province::create([
            'id'        => 46,
            'region_id' => 14,
            'name'      => 'Aisén',
        ]);

        Province::create([
            'id'        => 47,
            'region_id' => 14,
            'name'      => 'Capitán Prat',
        ]);

        Province::create([
            'id'        => 48,
            'region_id' => 14,
            'name'      => 'Coihaique',
        ]);

        Province::create([
            'id'        => 49,
            'region_id' => 14,
            'name'      => 'General Carrera',
        ]);

        Province::create([
            'id'        => 50,
            'region_id' => 15,
            'name'      => 'Antártica Chilena',
        ]);

        Province::create([
            'id'        => 51,
            'region_id' => 15,
            'name'      => 'Magallanes',
        ]);

        Province::create([
            'id'        => 52,
            'region_id' => 15,
            'name'      => 'Tierra del Fuego',
        ]);

        Province::create([
            'id'        => 53,
            'region_id' => 15,
            'name'      => 'Última Esperanza',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
