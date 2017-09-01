<?php

use Illuminate\Database\Seeder;
use Controlqtime\Core\Entities\Company;

class CompanyTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('companies')->truncate();

        $state = getenv('APP_ENV') === 'local' ? 'enable' : 'disable';

        $company = Company::create([
            'type_company_id' => 1,
            'rut'             => '76530927-1',
            'firm_name'       => 'Control Qtime S.p.A',
            'gyre'            => 'Servicios integrales informáticos, desarrollos experimentales',
            'start_act'       => '31-07-2015',
            'muni_license'    => '000000',
            'email_company'   => 'contacto@controlqtime.cl’',
            'state'           => $state,
        ]); 

        DB::table('area_company')->truncate();

		DB::table('area_company')->insert([
			'company_id' 	=> $company->id,
			'area_id' 		=> 1
		]);
    }
}
