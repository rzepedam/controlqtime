<?php

use Controlqtime\Core\Entities\Commune;
use Illuminate\Database\Seeder;

class CommuneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('communes')->truncate();

        Commune::create([
            'id'          => 1,
            'province_id' => 1,
            'name'        => 'Arica',
        ]);

        Commune::create([
            'id'          => 2,
            'province_id' => 1,
            'name'        => 'Camarones',
        ]);

        Commune::create([
            'id'          => 3,
            'province_id' => 2,
            'name'        => 'General Lagos',
        ]);

        Commune::create([
            'id'          => 4,
            'province_id' => 2,
            'name'        => 'Putre',
        ]);

        Commune::create([
            'id'          => 5,
            'province_id' => 3,
            'name'        => 'Alto Hospicio',
        ]);

        Commune::create([
            'id'          => 6,
            'province_id' => 3,
            'name'        => 'Iquique',
        ]);

        Commune::create([
            'id'          => 7,
            'province_id' => 4,
            'name'        => 'Camiña',
        ]);

        Commune::create([
            'id'          => 8,
            'province_id' => 4,
            'name'        => 'Colchane',
        ]);

        Commune::create([
            'id'          => 9,
            'province_id' => 4,
            'name'        => 'Huara',
        ]);

        Commune::create([
            'id'          => 10,
            'province_id' => 4,
            'name'        => 'Pica',
        ]);

        Commune::create([
            'id'          => 11,
            'province_id' => 4,
            'name'        => 'Pozo Almonte',
        ]);

        Commune::create([
            'id'          => 12,
            'province_id' => 5,
            'name'        => 'Antofagasta',
        ]);

        Commune::create([
            'id'          => 13,
            'province_id' => 5,
            'name'        => 'Mejillones',
        ]);

        Commune::create([
            'id'          => 14,
            'province_id' => 5,
            'name'        => 'Sierra Gorda',
        ]);

        Commune::create([
            'id'          => 15,
            'province_id' => 5,
            'name'        => 'Taltal',
        ]);

        Commune::create([
            'id'          => 16,
            'province_id' => 6,
            'name'        => 'Calama',
        ]);

        Commune::create([
            'id'          => 17,
            'province_id' => 6,
            'name'        => 'Ollague',
        ]);

        Commune::create([
            'id'          => 18,
            'province_id' => 6,
            'name'        => 'San Pedro de Atacama',
        ]);

        Commune::create([
            'id'          => 19,
            'province_id' => 7,
            'name'        => 'María Elena',
        ]);

        Commune::create([
            'id'          => 20,
            'province_id' => 7,
            'name'        => 'Tocopilla',
        ]);

        Commune::create([
            'id'          => 21,
            'province_id' => 8,
            'name'        => 'Chañaral',
        ]);

        Commune::create([
            'id'          => 22,
            'province_id' => 8,
            'name'        => 'Diego de Almagro',
        ]);

        Commune::create([
            'id'          => 23,
            'province_id' => 9,
            'name'        => 'Caldera',
        ]);

        Commune::create([
            'id'          => 24,
            'province_id' => 9,
            'name'        => 'Copiapó',
        ]);

        Commune::create([
            'id'          => 25,
            'province_id' => 9,
            'name'        => 'Tierra Amarilla',
        ]);

        Commune::create([
            'id'          => 26,
            'province_id' => 10,
            'name'        => 'Alto del Carmen',
        ]);

        Commune::create([
            'id'          => 27,
            'province_id' => 10,
            'name'        => 'Freirina',
        ]);

        Commune::create([
            'id'          => 28,
            'province_id' => 10,
            'name'        => 'Huasco',
        ]);

        Commune::create([
            'id'          => 29,
            'province_id' => 10,
            'name'        => 'Vallenar',
        ]);

        Commune::create([
            'id'          => 30,
            'province_id' => 11,
            'name'        => 'Canela',
        ]);

        Commune::create([
            'id'          => 31,
            'province_id' => 11,
            'name'        => 'Illapel',
        ]);

        Commune::create([
            'id'          => 32,
            'province_id' => 11,
            'name'        => 'Los Vilos',
        ]);

        Commune::create([
            'id'          => 33,
            'province_id' => 11,
            'name'        => 'Salamanca',
        ]);

        Commune::create([
            'id'          => 34,
            'province_id' => 12,
            'name'        => 'Andacollo',
        ]);

        Commune::create([
            'id'          => 35,
            'province_id' => 12,
            'name'        => 'Coquimbo',
        ]);

        Commune::create([
            'id'          => 36,
            'province_id' => 12,
            'name'        => 'La Higuera',
        ]);

        Commune::create([
            'id'          => 37,
            'province_id' => 12,
            'name'        => 'La Serena',
        ]);

        Commune::create([
            'id'          => 38,
            'province_id' => 12,
            'name'        => 'Paihuaco',
        ]);

        Commune::create([
            'id'          => 39,
            'province_id' => 12,
            'name'        => 'Vicuña',
        ]);

        Commune::create([
            'id'          => 40,
            'province_id' => 13,
            'name'        => 'Combarbalá',
        ]);

        Commune::create([
            'id'          => 41,
            'province_id' => 13,
            'name'        => 'Monte Patria',
        ]);

        Commune::create([
            'id'          => 42,
            'province_id' => 13,
            'name'        => 'Ovalle',
        ]);

        Commune::create([
            'id'          => 43,
            'province_id' => 13,
            'name'        => 'Punitaqui',
        ]);

        Commune::create([
            'id'          => 44,
            'province_id' => 13,
            'name'        => 'Río Hurtado',
        ]);

        Commune::create([
            'id'          => 45,
            'province_id' => 14,
            'name'        => 'Isla de Pascua',
        ]);

        Commune::create([
            'id'          => 46,
            'province_id' => 15,
            'name'        => 'Calle Larga',
        ]);

        Commune::create([
            'id'          => 47,
            'province_id' => 15,
            'name'        => 'Los Andes',
        ]);

        Commune::create([
            'id'          => 48,
            'province_id' => 15,
            'name'        => 'Rinconada',
        ]);

        Commune::create([
            'id'          => 49,
            'province_id' => 15,
            'name'        => 'San Esteban',
        ]);

        Commune::create([
            'id'          => 50,
            'province_id' => 16,
            'name'        => 'La Ligua',
        ]);

        Commune::create([
            'id'          => 51,
            'province_id' => 16,
            'name'        => 'Papudo',
        ]);

        Commune::create([
            'id'          => 52,
            'province_id' => 16,
            'name'        => 'Petorca',
        ]);

        Commune::create([
            'id'          => 53,
            'province_id' => 16,
            'name'        => 'Zapallar',
        ]);

        Commune::create([
            'id'          => 54,
            'province_id' => 17,
            'name'        => 'Hijuelas',
        ]);

        Commune::create([
            'id'          => 55,
            'province_id' => 17,
            'name'        => 'La Calera',
        ]);

        Commune::create([
            'id'          => 56,
            'province_id' => 17,
            'name'        => 'La Cruz',
        ]);

        Commune::create([
            'id'          => 57,
            'province_id' => 17,
            'name'        => 'Limache',
        ]);

        Commune::create([
            'id'          => 58,
            'province_id' => 17,
            'name'        => 'Nogales',
        ]);

        Commune::create([
            'id'          => 59,
            'province_id' => 17,
            'name'        => 'Olmué',
        ]);

        Commune::create([
            'id'          => 60,
            'province_id' => 17,
            'name'        => 'Quillota',
        ]);

        Commune::create([
            'id'          => 61,
            'province_id' => 18,
            'name'        => 'Algarrobo',
        ]);

        Commune::create([
            'id'          => 62,
            'province_id' => 18,
            'name'        => 'Cartagena',
        ]);

        Commune::create([
            'id'          => 63,
            'province_id' => 18,
            'name'        => 'El Quisco',
        ]);

        Commune::create([
            'id'          => 64,
            'province_id' => 18,
            'name'        => 'El Tabo',
        ]);

        Commune::create([
            'id'          => 65,
            'province_id' => 18,
            'name'        => 'San Antonio',
        ]);

        Commune::create([
            'id'          => 66,
            'province_id' => 18,
            'name'        => 'Santo Domingo',
        ]);

        Commune::create([
            'id'          => 67,
            'province_id' => 19,
            'name'        => 'Catemu',
        ]);

        Commune::create([
            'id'          => 68,
            'province_id' => 19,
            'name'        => 'Llaillay',
        ]);

        Commune::create([
            'id'          => 69,
            'province_id' => 19,
            'name'        => 'Panquehue',
        ]);

        Commune::create([
            'id'          => 70,
            'province_id' => 19,
            'name'        => 'Putaendo',
        ]);

        Commune::create([
            'id'          => 71,
            'province_id' => 19,
            'name'        => 'San Felipe',
        ]);

        Commune::create([
            'id'          => 72,
            'province_id' => 19,
            'name'        => 'Santa María',
        ]);

        Commune::create([
            'id'          => 73,
            'province_id' => 20,
            'name'        => 'Casablanca',
        ]);

        Commune::create([
            'id'          => 74,
            'province_id' => 20,
            'name'        => 'Concón',
        ]);

        Commune::create([
            'id'          => 75,
            'province_id' => 20,
            'name'        => 'Juan Fernández',
        ]);

        Commune::create([
            'id'          => 76,
            'province_id' => 20,
            'name'        => 'Puchuncaví',
        ]);

        Commune::create([
            'id'          => 77,
            'province_id' => 20,
            'name'        => 'Quilpué',
        ]);

        Commune::create([
            'id'          => 78,
            'province_id' => 20,
            'name'        => 'Quintero',
        ]);

        Commune::create([
            'id'          => 79,
            'province_id' => 20,
            'name'        => 'Valparaíso',
        ]);

        Commune::create([
            'id'          => 80,
            'province_id' => 20,
            'name'        => 'Villa Alemana',
        ]);

        Commune::create([
            'id'          => 81,
            'province_id' => 20,
            'name'        => 'Viña del Mar',
        ]);

        Commune::create([
            'id'          => 82,
            'province_id' => 21,
            'name'        => 'Colina',
        ]);

        Commune::create([
            'id'          => 83,
            'province_id' => 21,
            'name'        => 'Lampa',
        ]);

        Commune::create([
            'id'          => 84,
            'province_id' => 21,
            'name'        => 'Tiltil',
        ]);

        Commune::create([
            'id'          => 85,
            'province_id' => 22,
            'name'        => 'Pirque',
        ]);

        Commune::create([
            'id'          => 86,
            'province_id' => 22,
            'name'        => 'Puente Alto',
        ]);

        Commune::create([
            'id'          => 87,
            'province_id' => 22,
            'name'        => 'San José de Maipo',
        ]);

        Commune::create([
            'id'          => 88,
            'province_id' => 23,
            'name'        => 'Buin',
        ]);

        Commune::create([
            'id'          => 89,
            'province_id' => 23,
            'name'        => 'Calera de Tango',
        ]);

        Commune::create([
            'id'          => 90,
            'province_id' => 23,
            'name'        => 'Paine',
        ]);

        Commune::create([
            'id'          => 91,
            'province_id' => 23,
            'name'        => 'San Bernardo',
        ]);

        Commune::create([
            'id'          => 92,
            'province_id' => 24,
            'name'        => 'Alhué',
        ]);

        Commune::create([
            'id'          => 93,
            'province_id' => 24,
            'name'        => 'Curacaví',
        ]);

        Commune::create([
            'id'          => 94,
            'province_id' => 24,
            'name'        => 'María Pinto',
        ]);

        Commune::create([
            'id'          => 95,
            'province_id' => 24,
            'name'        => 'Melipilla',
        ]);

        Commune::create([
            'id'          => 96,
            'province_id' => 24,
            'name'        => 'San Pedro',
        ]);

        Commune::create([
            'id'          => 97,
            'province_id' => 25,
            'name'        => 'Cerrillos',
        ]);

        Commune::create([
            'id'          => 98,
            'province_id' => 25,
            'name'        => 'Cerro Navia',
        ]);

        Commune::create([
            'id'          => 99,
            'province_id' => 25,
            'name'        => 'Conchalí',
        ]);

        Commune::create([
            'id'          => 100,
            'province_id' => 25,
            'name'        => 'El Bosque',
        ]);

        Commune::create([
            'id'          => 101,
            'province_id' => 25,
            'name'        => 'Estación Central',
        ]);

        Commune::create([
            'id'          => 102,
            'province_id' => 25,
            'name'        => 'Huechuraba',
        ]);

        Commune::create([
            'id'          => 103,
            'province_id' => 25,
            'name'        => 'Independencia',
        ]);

        Commune::create([
            'id'          => 104,
            'province_id' => 25,
            'name'        => 'La Cisterna',
        ]);

        Commune::create([
            'id'          => 105,
            'province_id' => 25,
            'name'        => 'La Granja',
        ]);

        Commune::create([
            'id'          => 106,
            'province_id' => 25,
            'name'        => 'La Florida',
        ]);

        Commune::create([
            'id'          => 107,
            'province_id' => 25,
            'name'        => 'La Pintana',
        ]);

        Commune::create([
            'id'          => 108,
            'province_id' => 25,
            'name'        => 'La Reina',
        ]);

        Commune::create([
            'id'          => 109,
            'province_id' => 25,
            'name'        => 'Las Condes',
        ]);

        Commune::create([
            'id'          => 110,
            'province_id' => 25,
            'name'        => 'Lo Barnechea',
        ]);

        Commune::create([
            'id'          => 111,
            'province_id' => 25,
            'name'        => 'Lo Espejo',
        ]);

        Commune::create([
            'id'          => 112,
            'province_id' => 25,
            'name'        => 'Lo Prado',
        ]);

        Commune::create([
            'id'          => 113,
            'province_id' => 25,
            'name'        => 'Macul',
        ]);

        Commune::create([
            'id'          => 114,
            'province_id' => 25,
            'name'        => 'Maipú',
        ]);

        Commune::create([
            'id'          => 115,
            'province_id' => 25,
            'name'        => 'Ñuñoa',
        ]);

        Commune::create([
            'id'          => 116,
            'province_id' => 25,
            'name'        => 'Pedro Aguirre Cerda',
        ]);

        Commune::create([
            'id'          => 117,
            'province_id' => 25,
            'name'        => 'Peñalolén',
        ]);

        Commune::create([
            'id'          => 118,
            'province_id' => 25,
            'name'        => 'Providencia',
        ]);

        Commune::create([
            'id'          => 119,
            'province_id' => 25,
            'name'        => 'Pudahuel',
        ]);

        Commune::create([
            'id'          => 120,
            'province_id' => 25,
            'name'        => 'Quilicura',
        ]);

        Commune::create([
            'id'          => 121,
            'province_id' => 25,
            'name'        => 'Quinta Normal',
        ]);

        Commune::create([
            'id'          => 122,
            'province_id' => 25,
            'name'        => 'Recoleta',
        ]);

        Commune::create([
            'id'          => 123,
            'province_id' => 25,
            'name'        => 'Renca',
        ]);

        Commune::create([
            'id'          => 124,
            'province_id' => 25,
            'name'        => 'San Miguel',
        ]);

        Commune::create([
            'id'          => 125,
            'province_id' => 25,
            'name'        => 'San Joaquín',
        ]);

        Commune::create([
            'id'          => 126,
            'province_id' => 25,
            'name'        => 'San Ramón',
        ]);

        Commune::create([
            'id'          => 127,
            'province_id' => 25,
            'name'        => 'Santiago',
        ]);

        Commune::create([
            'id'          => 128,
            'province_id' => 25,
            'name'        => 'Vitacura',
        ]);

        Commune::create([
            'id'          => 129,
            'province_id' => 26,
            'name'        => 'El Monte',
        ]);

        Commune::create([
            'id'          => 130,
            'province_id' => 26,
            'name'        => 'Isla de Maipo',
        ]);

        Commune::create([
            'id'          => 131,
            'province_id' => 26,
            'name'        => 'Padre Hurtado',
        ]);

        Commune::create([
            'id'          => 132,
            'province_id' => 26,
            'name'        => 'Peñaflor',
        ]);

        Commune::create([
            'id'          => 133,
            'province_id' => 26,
            'name'        => 'Talagante',
        ]);

        Commune::create([
            'id'          => 134,
            'province_id' => 27,
            'name'        => 'Codegua',
        ]);

        Commune::create([
            'id'          => 135,
            'province_id' => 27,
            'name'        => 'Coínco',
        ]);

        Commune::create([
            'id'          => 136,
            'province_id' => 27,
            'name'        => 'Coltauco',
        ]);

        Commune::create([
            'id'          => 137,
            'province_id' => 27,
            'name'        => 'Doñihue',
        ]);

        Commune::create([
            'id'          => 138,
            'province_id' => 27,
            'name'        => 'Graneros',
        ]);

        Commune::create([
            'id'          => 139,
            'province_id' => 27,
            'name'        => 'Las Cabras',
        ]);

        Commune::create([
            'id'          => 140,
            'province_id' => 27,
            'name'        => 'Machalí',
        ]);

        Commune::create([
            'id'          => 141,
            'province_id' => 27,
            'name'        => 'Malloa',
        ]);

        Commune::create([
            'id'          => 142,
            'province_id' => 27,
            'name'        => 'Mostazal',
        ]);

        Commune::create([
            'id'          => 143,
            'province_id' => 27,
            'name'        => 'Olivar',
        ]);

        Commune::create([
            'id'          => 144,
            'province_id' => 27,
            'name'        => 'Peumo',
        ]);

        Commune::create([
            'id'          => 145,
            'province_id' => 27,
            'name'        => 'Pichidegua',
        ]);

        Commune::create([
            'id'          => 146,
            'province_id' => 27,
            'name'        => 'Quinta de Tilcoco',
        ]);

        Commune::create([
            'id'          => 147,
            'province_id' => 27,
            'name'        => 'Rancagua',
        ]);

        Commune::create([
            'id'          => 148,
            'province_id' => 27,
            'name'        => 'Rengo',
        ]);

        Commune::create([
            'id'          => 149,
            'province_id' => 27,
            'name'        => 'Requínoa',
        ]);

        Commune::create([
            'id'          => 150,
            'province_id' => 27,
            'name'        => 'San Vicente de Tagua Tagua',
        ]);

        Commune::create([
            'id'          => 151,
            'province_id' => 28,
            'name'        => 'La Estrella',
        ]);

        Commune::create([
            'id'          => 152,
            'province_id' => 28,
            'name'        => 'Litueche',
        ]);

        Commune::create([
            'id'          => 153,
            'province_id' => 28,
            'name'        => 'Marchihue',
        ]);

        Commune::create([
            'id'          => 154,
            'province_id' => 28,
            'name'        => 'Navidad',
        ]);

        Commune::create([
            'id'          => 155,
            'province_id' => 28,
            'name'        => 'Peredones',
        ]);

        Commune::create([
            'id'          => 156,
            'province_id' => 28,
            'name'        => 'Pichilemu',
        ]);

        Commune::create([
            'id'          => 159,
            'province_id' => 29,
            'name'        => 'Chépica',
        ]);

        Commune::create([
            'id'          => 160,
            'province_id' => 29,
            'name'        => 'Chimbarongo',
        ]);

        Commune::create([
            'id'          => 161,
            'province_id' => 29,
            'name'        => 'Lolol',
        ]);

        Commune::create([
            'id'          => 162,
            'province_id' => 29,
            'name'        => 'Nancagua',
        ]);

        Commune::create([
            'id'          => 163,
            'province_id' => 29,
            'name'        => 'Palmilla',
        ]);

        Commune::create([
            'id'          => 164,
            'province_id' => 29,
            'name'        => 'Peralillo',
        ]);

        Commune::create([
            'id'          => 165,
            'province_id' => 29,
            'name'        => 'Placilla',
        ]);

        Commune::create([
            'id'          => 166,
            'province_id' => 29,
            'name'        => 'Pumanque',
        ]);

        Commune::create([
            'id'          => 167,
            'province_id' => 29,
            'name'        => 'San Fernando',
        ]);

        Commune::create([
            'id'          => 168,
            'province_id' => 29,
            'name'        => 'Santa Cruz',
        ]);

        Commune::create([
            'id'          => 169,
            'province_id' => 30,
            'name'        => 'Cauquenes',
        ]);

        Commune::create([
            'id'          => 170,
            'province_id' => 30,
            'name'        => 'Chanco',
        ]);

        Commune::create([
            'id'          => 171,
            'province_id' => 30,
            'name'        => 'Pelluhue',
        ]);

        Commune::create([
            'id'          => 172,
            'province_id' => 31,
            'name'        => 'Curicó',
        ]);

        Commune::create([
            'id'          => 173,
            'province_id' => 31,
            'name'        => 'Hualañé',
        ]);

        Commune::create([
            'id'          => 174,
            'province_id' => 31,
            'name'        => 'Licantén',
        ]);

        Commune::create([
            'id'          => 175,
            'province_id' => 31,
            'name'        => 'Molina',
        ]);

        Commune::create([
            'id'          => 176,
            'province_id' => 31,
            'name'        => 'Rauco',
        ]);

        Commune::create([
            'id'          => 177,
            'province_id' => 31,
            'name'        => 'Romeral',
        ]);

        Commune::create([
            'id'          => 178,
            'province_id' => 31,
            'name'        => 'Sagrada Familia',
        ]);

        Commune::create([
            'id'          => 179,
            'province_id' => 31,
            'name'        => 'Teno',
        ]);

        Commune::create([
            'id'          => 180,
            'province_id' => 31,
            'name'        => 'Vichuquén',
        ]);

        Commune::create([
            'id'          => 181,
            'province_id' => 32,
            'name'        => 'Colbún',
        ]);

        Commune::create([
            'id'          => 182,
            'province_id' => 32,
            'name'        => 'Linares',
        ]);

        Commune::create([
            'id'          => 183,
            'province_id' => 32,
            'name'        => 'Longaví',
        ]);

        Commune::create([
            'id'          => 184,
            'province_id' => 32,
            'name'        => 'Parral',
        ]);

        Commune::create([
            'id'          => 185,
            'province_id' => 32,
            'name'        => 'Retiro',
        ]);

        Commune::create([
            'id'          => 186,
            'province_id' => 32,
            'name'        => 'San Javier',
        ]);

        Commune::create([
            'id'          => 187,
            'province_id' => 32,
            'name'        => 'Villa Alegre',
        ]);

        Commune::create([
            'id'          => 188,
            'province_id' => 32,
            'name'        => 'Yerbas Buenas',
        ]);

        Commune::create([
            'id'          => 189,
            'province_id' => 33,
            'name'        => 'Constitución',
        ]);

        Commune::create([
            'id'          => 190,
            'province_id' => 33,
            'name'        => 'Curepto',
        ]);

        Commune::create([
            'id'          => 191,
            'province_id' => 33,
            'name'        => 'Empedrado',
        ]);

        Commune::create([
            'id'          => 192,
            'province_id' => 33,
            'name'        => 'Maule',
        ]);

        Commune::create([
            'id'          => 193,
            'province_id' => 33,
            'name'        => 'Pelarco',
        ]);

        Commune::create([
            'id'          => 194,
            'province_id' => 33,
            'name'        => 'Pencahue',
        ]);

        Commune::create([
            'id'          => 195,
            'province_id' => 33,
            'name'        => 'Río Claro',
        ]);

        Commune::create([
            'id'          => 196,
            'province_id' => 33,
            'name'        => 'San Clemente',
        ]);

        Commune::create([
            'id'          => 197,
            'province_id' => 33,
            'name'        => 'San Rafael',
        ]);

        Commune::create([
            'id'          => 198,
            'province_id' => 33,
            'name'        => 'Talca',
        ]);

        Commune::create([
            'id'          => 199,
            'province_id' => 34,
            'name'        => 'Arauco',
        ]);

        Commune::create([
            'id'          => 200,
            'province_id' => 34,
            'name'        => 'Cañete',
        ]);

        Commune::create([
            'id'          => 201,
            'province_id' => 34,
            'name'        => 'Contulmo',
        ]);

        Commune::create([
            'id'          => 202,
            'province_id' => 34,
            'name'        => 'Curanilahue',
        ]);

        Commune::create([
            'id'          => 203,
            'province_id' => 34,
            'name'        => 'Lebu',
        ]);

        Commune::create([
            'id'          => 204,
            'province_id' => 34,
            'name'        => 'Los Álamos',
        ]);

        Commune::create([
            'id'          => 205,
            'province_id' => 34,
            'name'        => 'Tirúa',
        ]);

        Commune::create([
            'id'          => 206,
            'province_id' => 35,
            'name'        => 'Alto Biobío',
        ]);

        Commune::create([
            'id'          => 207,
            'province_id' => 35,
            'name'        => 'Antuco',
        ]);

        Commune::create([
            'id'          => 208,
            'province_id' => 35,
            'name'        => 'Cabrero',
        ]);

        Commune::create([
            'id'          => 209,
            'province_id' => 35,
            'name'        => 'Laja',
        ]);

        Commune::create([
            'id'          => 210,
            'province_id' => 35,
            'name'        => 'Los Ángeles',
        ]);

        Commune::create([
            'id'          => 211,
            'province_id' => 35,
            'name'        => 'Mulchén',
        ]);

        Commune::create([
            'id'          => 212,
            'province_id' => 35,
            'name'        => 'Nacimiento',
        ]);

        Commune::create([
            'id'          => 213,
            'province_id' => 35,
            'name'        => 'Negrete',
        ]);

        Commune::create([
            'id'          => 214,
            'province_id' => 35,
            'name'        => 'Quilaco',
        ]);

        Commune::create([
            'id'          => 215,
            'province_id' => 35,
            'name'        => 'Quilleco',
        ]);

        Commune::create([
            'id'          => 216,
            'province_id' => 35,
            'name'        => 'San Rosendo',
        ]);

        Commune::create([
            'id'          => 217,
            'province_id' => 35,
            'name'        => 'Santa Bárbara',
        ]);

        Commune::create([
            'id'          => 218,
            'province_id' => 35,
            'name'        => 'Tucapel',
        ]);

        Commune::create([
            'id'          => 219,
            'province_id' => 35,
            'name'        => 'Yumbel',
        ]);

        Commune::create([
            'id'          => 220,
            'province_id' => 36,
            'name'        => 'Chiguayante',
        ]);

        Commune::create([
            'id'          => 221,
            'province_id' => 36,
            'name'        => 'Concepción',
        ]);

        Commune::create([
            'id'          => 222,
            'province_id' => 36,
            'name'        => 'Coronel',
        ]);

        Commune::create([
            'id'          => 223,
            'province_id' => 36,
            'name'        => 'Florida',
        ]);

        Commune::create([
            'id'          => 224,
            'province_id' => 36,
            'name'        => 'Hualpén',
        ]);

        Commune::create([
            'id'          => 225,
            'province_id' => 36,
            'name'        => 'Hualqui',
        ]);

        Commune::create([
            'id'          => 226,
            'province_id' => 36,
            'name'        => 'Lota',
        ]);

        Commune::create([
            'id'          => 227,
            'province_id' => 36,
            'name'        => 'Penco',
        ]);

        Commune::create([
            'id'          => 228,
            'province_id' => 36,
            'name'        => 'San Pedro de La Paz',
        ]);

        Commune::create([
            'id'          => 229,
            'province_id' => 36,
            'name'        => 'Santa Juana',
        ]);

        Commune::create([
            'id'          => 230,
            'province_id' => 36,
            'name'        => 'Talcahuano',
        ]);

        Commune::create([
            'id'          => 231,
            'province_id' => 36,
            'name'        => 'Tomé',
        ]);

        Commune::create([
            'id'          => 232,
            'province_id' => 37,
            'name'        => 'Bulnes',
        ]);

        Commune::create([
            'id'          => 233,
            'province_id' => 37,
            'name'        => 'Chillán',
        ]);

        Commune::create([
            'id'          => 234,
            'province_id' => 37,
            'name'        => 'Chillán Viejo',
        ]);

        Commune::create([
            'id'          => 235,
            'province_id' => 37,
            'name'        => 'Cobquecura',
        ]);

        Commune::create([
            'id'          => 236,
            'province_id' => 37,
            'name'        => 'Coelemu',
        ]);

        Commune::create([
            'id'          => 237,
            'province_id' => 37,
            'name'        => 'Coihueco',
        ]);

        Commune::create([
            'id'          => 238,
            'province_id' => 37,
            'name'        => 'El Carmen',
        ]);

        Commune::create([
            'id'          => 239,
            'province_id' => 37,
            'name'        => 'Ninhue',
        ]);

        Commune::create([
            'id'          => 240,
            'province_id' => 37,
            'name'        => 'Ñiquen',
        ]);

        Commune::create([
            'id'          => 241,
            'province_id' => 37,
            'name'        => 'Pemuco',
        ]);

        Commune::create([
            'id'          => 242,
            'province_id' => 37,
            'name'        => 'Pinto',
        ]);

        Commune::create([
            'id'          => 243,
            'province_id' => 37,
            'name'        => 'Portezuelo',
        ]);

        Commune::create([
            'id'          => 244,
            'province_id' => 37,
            'name'        => 'Quillón',
        ]);

        Commune::create([
            'id'          => 245,
            'province_id' => 37,
            'name'        => 'Quirihue',
        ]);

        Commune::create([
            'id'          => 246,
            'province_id' => 37,
            'name'        => 'Ránquil',
        ]);

        Commune::create([
            'id'          => 247,
            'province_id' => 37,
            'name'        => 'San Carlos',
        ]);

        Commune::create([
            'id'          => 248,
            'province_id' => 37,
            'name'        => 'San Fabián',
        ]);

        Commune::create([
            'id'          => 249,
            'province_id' => 37,
            'name'        => 'San Ignacio',
        ]);

        Commune::create([
            'id'          => 250,
            'province_id' => 37,
            'name'        => 'San Nicolás',
        ]);

        Commune::create([
            'id'          => 251,
            'province_id' => 37,
            'name'        => 'Treguaco',
        ]);

        Commune::create([
            'id'          => 252,
            'province_id' => 37,
            'name'        => 'Yungay',
        ]);

        Commune::create([
            'id'          => 253,
            'province_id' => 38,
            'name'        => 'Carahue',
        ]);

        Commune::create([
            'id'          => 254,
            'province_id' => 38,
            'name'        => 'Cholchol',
        ]);

        Commune::create([
            'id'          => 255,
            'province_id' => 38,
            'name'        => 'Cunco',
        ]);

        Commune::create([
            'id'          => 256,
            'province_id' => 38,
            'name'        => 'Curarrehue',
        ]);

        Commune::create([
            'id'          => 257,
            'province_id' => 38,
            'name'        => 'Freire',
        ]);

        Commune::create([
            'id'          => 258,
            'province_id' => 38,
            'name'        => 'Galvarino',
        ]);

        Commune::create([
            'id'          => 259,
            'province_id' => 38,
            'name'        => 'Gorbea',
        ]);

        Commune::create([
            'id'          => 260,
            'province_id' => 38,
            'name'        => 'Lautaro',
        ]);

        Commune::create([
            'id'          => 261,
            'province_id' => 38,
            'name'        => 'Loncoche',
        ]);

        Commune::create([
            'id'          => 262,
            'province_id' => 38,
            'name'        => 'Melipeuco',
        ]);

        Commune::create([
            'id'          => 263,
            'province_id' => 38,
            'name'        => 'Nueva Imperial',
        ]);

        Commune::create([
            'id'          => 264,
            'province_id' => 38,
            'name'        => 'Padre Las Casas',
        ]);

        Commune::create([
            'id'          => 265,
            'province_id' => 38,
            'name'        => 'Perquenco',
        ]);

        Commune::create([
            'id'          => 266,
            'province_id' => 38,
            'name'        => 'Pitrufquén',
        ]);

        Commune::create([
            'id'          => 267,
            'province_id' => 38,
            'name'        => 'Pucón',
        ]);

        Commune::create([
            'id'          => 268,
            'province_id' => 38,
            'name'        => 'Puerto Saavedra',
        ]);

        Commune::create([
            'id'          => 269,
            'province_id' => 38,
            'name'        => 'Temuco',
        ]);

        Commune::create([
            'id'          => 270,
            'province_id' => 38,
            'name'        => 'Teodoro Schmidt',
        ]);

        Commune::create([
            'id'          => 271,
            'province_id' => 38,
            'name'        => 'Toltén',
        ]);

        Commune::create([
            'id'          => 272,
            'province_id' => 38,
            'name'        => 'Vilcún',
        ]);

        Commune::create([
            'id'          => 273,
            'province_id' => 38,
            'name'        => 'Villarrica',
        ]);

        Commune::create([
            'id'          => 274,
            'province_id' => 39,
            'name'        => 'Angol',
        ]);

        Commune::create([
            'id'          => 275,
            'province_id' => 39,
            'name'        => 'Collipulli',
        ]);

        Commune::create([
            'id'          => 276,
            'province_id' => 39,
            'name'        => 'Curacautín',
        ]);

        Commune::create([
            'id'          => 277,
            'province_id' => 39,
            'name'        => 'Ercilla',
        ]);

        Commune::create([
            'id'          => 278,
            'province_id' => 39,
            'name'        => 'Lonquimay',
        ]);

        Commune::create([
            'id'          => 279,
            'province_id' => 39,
            'name'        => 'Los Sauces',
        ]);

        Commune::create([
            'id'          => 280,
            'province_id' => 39,
            'name'        => 'Lumaco',
        ]);

        Commune::create([
            'id'          => 281,
            'province_id' => 39,
            'name'        => 'Purén',
        ]);

        Commune::create([
            'id'          => 282,
            'province_id' => 39,
            'name'        => 'Renaico',
        ]);

        Commune::create([
            'id'          => 283,
            'province_id' => 39,
            'name'        => 'Traiguén',
        ]);

        Commune::create([
            'id'          => 284,
            'province_id' => 39,
            'name'        => 'Victoria',
        ]);

        Commune::create([
            'id'          => 285,
            'province_id' => 40,
            'name'        => 'Corral',
        ]);

        Commune::create([
            'id'          => 286,
            'province_id' => 40,
            'name'        => 'Lanco',
        ]);

        Commune::create([
            'id'          => 287,
            'province_id' => 40,
            'name'        => 'Los Lagos',
        ]);

        Commune::create([
            'id'          => 288,
            'province_id' => 40,
            'name'        => 'Máfil',
        ]);

        Commune::create([
            'id'          => 289,
            'province_id' => 40,
            'name'        => 'Mariquina',
        ]);

        Commune::create([
            'id'          => 290,
            'province_id' => 40,
            'name'        => 'Paillaco',
        ]);

        Commune::create([
            'id'          => 291,
            'province_id' => 40,
            'name'        => 'Panguipulli',
        ]);

        Commune::create([
            'id'          => 292,
            'province_id' => 40,
            'name'        => 'Valdivia',
        ]);

        Commune::create([
            'id'          => 293,
            'province_id' => 41,
            'name'        => 'Futrono',
        ]);

        Commune::create([
            'id'          => 294,
            'province_id' => 41,
            'name'        => 'La Unión',
        ]);

        Commune::create([
            'id'          => 295,
            'province_id' => 41,
            'name'        => 'Lago Ranco',
        ]);

        Commune::create([
            'id'          => 296,
            'province_id' => 41,
            'name'        => 'Río Bueno',
        ]);

        Commune::create([
            'id'          => 297,
            'province_id' => 42,
            'name'        => 'Ancud',
        ]);

        Commune::create([
            'id'          => 298,
            'province_id' => 42,
            'name'        => 'Castro',
        ]);

        Commune::create([
            'id'          => 299,
            'province_id' => 42,
            'name'        => 'Chonchi',
        ]);

        Commune::create([
            'id'          => 300,
            'province_id' => 42,
            'name'        => 'Curaco de Vélez',
        ]);

        Commune::create([
            'id'          => 301,
            'province_id' => 42,
            'name'        => 'Dalcahue',
        ]);

        Commune::create([
            'id'          => 302,
            'province_id' => 42,
            'name'        => 'Puqueldón',
        ]);

        Commune::create([
            'id'          => 303,
            'province_id' => 42,
            'name'        => 'Queilén',
        ]);

        Commune::create([
            'id'          => 304,
            'province_id' => 42,
            'name'        => 'Quemchi',
        ]);

        Commune::create([
            'id'          => 305,
            'province_id' => 42,
            'name'        => 'Quellón',
        ]);

        Commune::create([
            'id'          => 306,
            'province_id' => 42,
            'name'        => 'Quinchao',
        ]);

        Commune::create([
            'id'          => 307,
            'province_id' => 43,
            'name'        => 'Calbuco',
        ]);

        Commune::create([
            'id'          => 308,
            'province_id' => 43,
            'name'        => 'Cochamó',
        ]);

        Commune::create([
            'id'          => 309,
            'province_id' => 43,
            'name'        => 'Fresia',
        ]);

        Commune::create([
            'id'          => 310,
            'province_id' => 43,
            'name'        => 'Frutillar',
        ]);

        Commune::create([
            'id'          => 311,
            'province_id' => 43,
            'name'        => 'Llanquihue',
        ]);

        Commune::create([
            'id'          => 312,
            'province_id' => 43,
            'name'        => 'Los Muermos',
        ]);

        Commune::create([
            'id'          => 313,
            'province_id' => 43,
            'name'        => 'Maullín',
        ]);

        Commune::create([
            'id'          => 314,
            'province_id' => 43,
            'name'        => 'Puerto Montt',
        ]);

        Commune::create([
            'id'          => 315,
            'province_id' => 43,
            'name'        => 'Puerto Varas',
        ]);

        Commune::create([
            'id'          => 316,
            'province_id' => 44,
            'name'        => 'Osorno',
        ]);

        Commune::create([
            'id'          => 317,
            'province_id' => 44,
            'name'        => 'Puerto Octay',
        ]);

        Commune::create([
            'id'          => 318,
            'province_id' => 44,
            'name'        => 'Purranque',
        ]);

        Commune::create([
            'id'          => 319,
            'province_id' => 44,
            'name'        => 'Puyehue',
        ]);

        Commune::create([
            'id'          => 320,
            'province_id' => 44,
            'name'        => 'Río Negro',
        ]);

        Commune::create([
            'id'          => 321,
            'province_id' => 44,
            'name'        => 'San Juan de la Costa',
        ]);

        Commune::create([
            'id'          => 322,
            'province_id' => 44,
            'name'        => 'San Pablo',
        ]);

        Commune::create([
            'id'          => 323,
            'province_id' => 45,
            'name'        => 'Chaitén',
        ]);

        Commune::create([
            'id'          => 324,
            'province_id' => 45,
            'name'        => 'Futaleufú',
        ]);

        Commune::create([
            'id'          => 325,
            'province_id' => 45,
            'name'        => 'Hualaihué',
        ]);

        Commune::create([
            'id'          => 326,
            'province_id' => 45,
            'name'        => 'Palena',
        ]);

        Commune::create([
            'id'          => 327,
            'province_id' => 46,
            'name'        => 'Aisén',
        ]);

        Commune::create([
            'id'          => 328,
            'province_id' => 46,
            'name'        => 'Cisnes',
        ]);

        Commune::create([
            'id'          => 329,
            'province_id' => 46,
            'name'        => 'Guaitecas',
        ]);

        Commune::create([
            'id'          => 330,
            'province_id' => 47,
            'name'        => 'Cochrane',
        ]);

        Commune::create([
            'id'          => 331,
            'province_id' => 47,
            'name'        => 'Ohiggins',
        ]);

        Commune::create([
            'id'          => 332,
            'province_id' => 47,
            'name'        => 'Tortel',
        ]);

        Commune::create([
            'id'          => 333,
            'province_id' => 48,
            'name'        => 'Coyhaique',
        ]);

        Commune::create([
            'id'          => 334,
            'province_id' => 48,
            'name'        => 'Lago Verde',
        ]);

        Commune::create([
            'id'          => 335,
            'province_id' => 49,
            'name'        => 'Chile Chico',
        ]);

        Commune::create([
            'id'          => 336,
            'province_id' => 49,
            'name'        => 'Río Ibáñez',
        ]);

        Commune::create([
            'id'          => 337,
            'province_id' => 50,
            'name'        => 'Antártica',
        ]);

        Commune::create([
            'id'          => 338,
            'province_id' => 50,
            'name'        => 'Cabo de Hornos',
        ]);

        Commune::create([
            'id'          => 339,
            'province_id' => 51,
            'name'        => 'Laguna Blanca',
        ]);

        Commune::create([
            'id'          => 340,
            'province_id' => 51,
            'name'        => 'Punta Arenas',
        ]);

        Commune::create([
            'id'          => 341,
            'province_id' => 51,
            'name'        => 'Río Verde',
        ]);

        Commune::create([
            'id'          => 342,
            'province_id' => 51,
            'name'        => 'San Gregorio',
        ]);

        Commune::create([
            'id'          => 343,
            'province_id' => 52,
            'name'        => 'Porvenir',
        ]);

        Commune::create([
            'id'          => 344,
            'province_id' => 52,
            'name'        => 'Primavera',
        ]);

        Commune::create([
            'id'          => 345,
            'province_id' => 52,
            'name'        => 'Timaukel',
        ]);

        Commune::create([
            'id'          => 346,
            'province_id' => 53,
            'name'        => 'Puerto Natales',
        ]);

        Commune::create([
            'id'          => 347,
            'province_id' => 53,
            'name'        => 'Torres del Paine',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
