<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CompanyCreateTest extends BrowserKitTestCase
{
	use DatabaseTransactions;

	protected $areas;
	protected $typeCompany;

	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeCompany = factory(\Controlqtime\Core\Entities\TypeCompany::class)->create();
		$this->areas       = factory(\Controlqtime\Core\Entities\Area::class, 3)->create();
	}

	/** @test */
	function create_company()
	{
		$this->visit('administration/companies/create')
			->seeInElement('h1', 'Crear Nueva Empresa')
			->seeInElement('#type_company_id', $this->typeCompany->name)
			->seeInElement('#region_id', $this->region->name)
			->seeInElement('#province_id', $this->province->name)
			->seeInElement('#commune_id', $this->commune->name)
			->seeInElement('#nationality_id', $this->nationality->name)
			->seeInElement('#region_legal_id', $this->region->name)
			->seeInElement('#province_legal_id', $this->province->name)
			->seeInElement('#commune_legal_id', $this->commune->name)
			->see($this->areas[0]->name)
			->see($this->areas[1]->name)
			->see($this->areas[2]->name)
			->seeInElement('button', 'Guardar')
			->assertResponseOk();
	}

	/** @test */
	function store_company()
	{
		$data = [
			'type_company_id'        => $this->typeCompany->id,
			'rut'                    => '6.639.112-4',
			'firm_name'              => 'Sociedad Parra Ltda.',
			'gyre'                   => 'Venta de insumos y repuestos para vehículos motorizados',
			'start_act'              => '01-12-1979',
			'muni_license'           => '8924798374',
			'address'                => 'Av. Vicuña Mackenna 12990',
			'lot'                    => '1B',
			'bod'                    => '14',
			'ofi'                    => '12',
			'floor'                  => '1',
			'region_id'              => $this->region->id,
			'province_id'            => $this->province->id,
			'commune_id'             => $this->commune->id,
			'phone1'                 => '+56988102901',
			'phone2'                 => '225909110',
			'email_company'          => 'parra.ltda@gmail.com',
			'area_id'                => [ $this->areas->pluck('id')[0], $this->areas->pluck('id')[1] ],
			'male_surname'           => 'Parra',
			'female_surname'         => 'Ossa',
			'first_name'             => 'Manuel',
			'second_name'            => 'José',
			'rut_representative'     => '17.638.322-4',
			'birthday'               => '11-04-1980',
			'nationality_id'         => $this->nationality->id,
			'address_representative' => 'Los Leones 170',
			'depto'                  => '19',
			'block'                  => '2',
			'num_home'               => '12',
			'region_id'              => $this->region->id,
			'province_id'            => $this->province->id,
			'commune_legal_id'       => $this->commune->id,
			'phone1_representative'  => '+56999102810',
			'phone2_representative'  => '',
			'email_representative'   => 'manuel.parra@gmail.com'
		];

		$this->postJson('administration/companies', $data)
			->seeJson([ 'status' => true, 'url' => '/administration/companies' ])
			->seeInDatabase('companies', [
				'type_company_id' => $this->typeCompany->id,
				'rut'             => '6639112-4',
				'firm_name'       => 'Sociedad Parra ltda.',
				'gyre'            => 'Venta de insumos y repuestos para vehículos motorizados',
				'start_act'       => '1979-12-01',
				'muni_license'    => '8924798374',
				'email_company'   => 'parra.ltda@gmail.com'
			])->seeInDatabase('addresses', [
				'addressable_type' => 'Controlqtime\Core\Entities\Company',
				'address'          => 'Av. Vicuña Mackenna 12990',
				'commune_id'       => $this->commune->id,
				'phone1'           => '+56988102901',
				'phone2'           => '225909110'
			])->seeInDatabase('detail_address_companies', [
				'lot'   => '1B',
				'bod'   => '14',
				'ofi'   => '12',
				'floor' => '1'
			])->seeInDatabase('legal_representatives', [
				'male_surname'         => 'Parra',
				'female_surname'       => 'Ossa',
				'first_name'           => 'Manuel',
				'second_name'          => 'José',
				'rut_representative'   => '17638322-4',
				'birthday'             => '1980-04-11',
				'nationality_id'       => $this->nationality->id,
				'email_representative' => 'manuel.parra@gmail.com'
			])->seeInDatabase('detail_address_legal_employees', [
				'depto'    => '19',
				'block'    => '2',
				'num_home' => '12',
			])->seeInDatabase('area_company', [
				'area_id' => $this->areas->pluck('id')[0],
			])->seeInDatabase('area_company', [
				'area_id' => $this->areas->pluck('id')[1],
			])->dontSeeInDatabase('area_company', [
				'area_id' => 999
			]);
	}
}
