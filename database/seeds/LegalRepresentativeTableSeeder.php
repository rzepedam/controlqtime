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
            'male_surname'          => 'Zepeda',
            'female_surname'        => 'Muñoz',
            'first_name'            => 'Roberto',
            'second_name'           => 'Andrés',
            'full_name'             => 'Roberto Andrés Zepeda Muñoz', 
            'rut_representative'    => '15679634-4',
            'birthday'              => '15-08-1984',
            'nationality_id'        => 4,
            'email_representative'  => 'robertozepeda@controlqtime.cl',
        ]);
    }
}
