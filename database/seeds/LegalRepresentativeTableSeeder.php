<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\LegalRepresentative;

class LegalRepresentativeTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('legal_representatives')->truncate();

        LegalRepresentative::create([
            'company_id'            => 1,
            'male_surname'          => 'Piña',
            'female_surname'        => 'Ocayo',
            'first_name'            => 'Alejandro',
            'second_name'           => 'Ulises',
            'rut_representative'    => '8635558-2',
            'birthday'              => '01-12-1964',
            'nationality_id'        => 4,
            'email_representative'  => 'apina@grupoalfra.cl',
        ]);
    }
}
