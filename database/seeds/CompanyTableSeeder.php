<?php

use Controlqtime\Core\Entities\Company;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
	public function run()
	{
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		DB::table('companies')->truncate();
		
		Company::create([
			'type_company_id' => 1,
			'rut'             => '76150396-0',
			'firm_name'       => 'Stop Frenos, Alejandro Ulises Piña Ocayo, E.I.R.L.',
			'gyre'            => 'Venta de partes, piezas y accesorios',
			'start_act'       => '',
			'muni_licence'    => '',
			'address'         => 'Palacio Riesco 3819',
			'commune_id'      => 102,
			'lot'             => '',
			'bod'             => '14',
			'ofi'             => '',
			'floor'           => '',
			'phone1'          => '+56222479619',
			'phone2'          => '+56994355002',
			'email_company'   => 'ventas@grupoalfra.cl',
			'state'           => 'disable'
		]);
		
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
		
	}
}
