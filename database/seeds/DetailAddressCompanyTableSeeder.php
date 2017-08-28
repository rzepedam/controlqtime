<?php

use Controlqtime\Core\Entities\DetailAddressCompany;
use Illuminate\Database\Seeder;

class DetailAddressCompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('detail_address_companies')->truncate();

        DetailAddressCompany::create([
            'address_id' => 2,
            'lot'        => '',
            'bod'        => 14,
            'ofi'        => '',
            'floor'      => '',
        ]);
    }
}
