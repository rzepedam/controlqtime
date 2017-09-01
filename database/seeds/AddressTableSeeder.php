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
            'address'          => 'Valle Soleado 03767',
            'commune_id'       => '12',
            'phone1'           => '+56994979953',
            'phone2'           => '+56994979953',
        ]);

        Address::create([
            'addressable_id'   => 1,
            'addressable_type' => 'Controlqtime\Core\Entities\Company',
            'address'          => 'Eduardo Orchard 455',
            'commune_id'       => '12',
            'phone1'           => '+56994979953',
            'phone2'           => '+56994979953',
        ]);

        Address::create([
            'addressable_id'   => 1,
            'addressable_type' => 'Controlqtime\Core\Entities\LegalRepresentative',
            'address'          => 'Eduardo Orchard 455 oficina 201-B',
            'commune_id'       => '12',
            'phone1'           => '+56994979953',
            'phone2'           => '+56994979953',
        ]);
    }
}
