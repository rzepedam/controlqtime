<?php

use Controlqtime\Core\Entities\TypeProfessionalLicense;
use Illuminate\Database\Seeder;

class TypeProfessionalLicenseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('type_professional_licenses')->truncate();

        TypeProfessionalLicense::create([
            'id'   => 1,
            'name' => 'Licencia A-1',
        ]);

        TypeProfessionalLicense::create([
            'id'   => 2,
            'name' => 'Licencia A-2',
        ]);

        TypeProfessionalLicense::create([
            'id'   => 3,
            'name' => 'Licencia B',
        ]);

        TypeProfessionalLicense::create([
            'id'   => 4,
            'name' => 'Licencia D',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
