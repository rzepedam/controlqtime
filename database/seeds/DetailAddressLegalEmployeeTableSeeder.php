<?php

use Controlqtime\Core\Entities\DetailAddressLegalEmployee;
use Illuminate\Database\Seeder;

class DetailAddressLegalEmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_address_legal_employees')->truncate();

        DetailAddressLegalEmployee::create([
            'address_id' => 1,
            'depto'      => '',
            'block'      => '',
            'num_home'   => '',
        ]);

        DetailAddressLegalEmployee::create([
            'address_id' => 3,
            'depto'      => '',
            'block'      => '',
            'num_home'   => '',
        ]);
    }
}
