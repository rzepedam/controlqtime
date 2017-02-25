<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CompanyShowTest extends BrowserKitTestCase
{
	use DatabaseTransactions;
	
	protected $company;
	
	protected $legalRepresentative;
	
	protected $addressCompany;
	
	protected $addressLegal;
	
	protected $detailAddressCompany;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		
		$region = factory(\Controlqtime\Core\Entities\Region::class)->create([
			'name' => 'Región Metropolitana de Santiago'
		]);
		
		$province = factory(\Controlqtime\Core\Entities\Province::class)->create([
			'region_id' => $region->id,
			'name'      => 'Santiago'
		]);
		
		$commune = factory(\Controlqtime\Core\Entities\Commune::class)->create([
			'province_id' => $province->id,
			'name'        => 'La Florida'
		]);
		
		$typeCompany = factory(\Controlqtime\Core\Entities\TypeCompany::class)->create([
			'name' => 'Operador'
		]);
		
		$this->company = factory(\Controlqtime\Core\Entities\Company::class)->create([
			'type_company_id' => $typeCompany->id,
			'rut'             => '6.639.112-4',
			'firm_name'       => 'Sociedad Parra Ltda.',
			'gyre'            => 'Venta de insumos y repuestos para vehículos motorizados',
			'start_act'       => '11-12-2016',
			'muni_license'    => '8924798374',
			'created_at'      => '2016-12-11 20:50:18'
		]);
		
		$this->legalRepresentative = factory(\Controlqtime\Core\Entities\LegalRepresentative::class)->create([
			'company_id'           => $this->company->id,
			'male_surname'         => 'Piña',
			'female_surname'       => 'Ocayo',
			'first_name'           => 'Alejandro',
			'second_name'          => 'Ulises',
			'rut_representative'   => '17.638.322-4',
			'birthday'             => '11-04-1980',
			'nationality_id'       => 1,
			'email_representative' => 'apina@grupoalfra.cl'
		]);
		
		$this->addressCompany = factory(\Controlqtime\Core\Entities\Address::class)->create([
			'addressable_id'   => $this->company->id,
			'addressable_type' => 'Controlqtime\Core\Entities\Company',
			'address'          => 'Vicuña Mackenna 2800',
			'phone1'           => '+56977190290',
			'phone2'           => '222808020',
			'commune_id'       => $commune->id,
		]);
		
		$this->addressLegal = factory(\Controlqtime\Core\Entities\Address::class)->create([
			'addressable_id'   => $this->legalRepresentative->id,
			'addressable_type' => 'Controlqtime\Core\Entities\LegalRepresentative',
			'address'          => 'Av. La Florida 1909',
			'phone1'           => '+56981002912',
			'phone2'           => '2225601029',
			'commune_id'       => 1,
		]);
		
		$this->detailAddressCompany = factory(\Controlqtime\Core\Entities\DetailAddressCompany::class)->create([
			'address_id' => $this->addressCompany->id,
			'lot'        => '2B',
			'bod'        => '14',
			'ofi'        => '10',
			'floor'      => '10'
		]);
		
		$this->detailAddressLegalEmployee = factory(\Controlqtime\Core\Entities\DetailAddressLegalEmployee::class)->create([
			'address_id' => $this->addressLegal->id,
			'depto'      => '839',
			'block'      => '12',
			'num_home'   => '14'
		]);
	}
	
	/** @test */
	function show_company()
	{
		$this->visit('administration/companies/' . $this->company->id)
			->seeInElement('h1', 'Detalle Empresa : <span class="text-primary">' . $this->company->id . '</span>')
			->seeInElement('a', 'Datos Empresa')
			->seeInElement('a', 'Representante Legal')
			->seeInElement('a', 'Documentos Adjuntos <span class="badge badge-warning up">' . $this->company->num_total_images . '</span>')
			->see('Operador')
			->see('Sociedad Parra Ltda.')
			->see('6.639.112-4')
			->see('Venta de insumos y repuestos para vehículos motorizados')
			->see('Vicuña Mackenna 2800, Lote 2B, Bodega 14, Oficina 10, Piso 10. La Florida, Santiago. Región Metropolitana de Santiago')
			->see('Domingo 11 Diciembre 2016')
			->see('8924798374')
			->see('Domingo 11 Diciembre 2016 20:50:18')
			->see('17.638.322-4')
			->see('36 años')
			->see('Av. La Florida 1909, Depto 839, Block 12, Nº Casa 14. La Florida. Santiago. Región Metropolitana de Santiago')
			->see('+56981002912')
			->see('2225601029')
			->see('apina@grupoalfra.cl')
			->assertResponseOk();
	}
}
