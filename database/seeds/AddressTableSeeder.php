<?php

use Controlqtime\Core\Entities\Address;
use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('addresses')->truncate();

        Address::create([
            'addressable_id'   => 1,
            'addressable_type' => 'Controlqtime\Core\Entities\Employee',
            'address'          => 'Pérez Valenzuela 1209',
            'commune_id'       => '118',
            'phone1'           => '+56974155784',
            'phone2'           => '+56222624050',
        ]);

        Address::create([
            'addressable_id'   => 2,
            'addressable_type' => 'Controlqtime\Core\Entities\Employee',
            'address'          => 'José Pedro Alessandri 61',
            'commune_id'       => '115',
            'phone1'           => '+56994979953',
            'phone2'           => '',
        ]);

        Address::create([
            'addressable_id'   => 1,
            'addressable_type' => 'Controlqtime\Core\Entities\Company',
            'address'          => 'Palacio Riesco 3819',
            'commune_id'       => '102',
            'phone1'           => '+56222479619',
            'phone2'           => '+56994355002',
        ]);

        Address::create([
            'addressable_id'   => 1,
            'addressable_type' => 'Controlqtime\Core\Entities\LegalRepresentative',
            'address'          => 'Palacio Riesco 3819',
            'commune_id'       => '102',
            'phone1'           => '+56994355002',
            'phone2'           => '',
        ]);
    }
}
