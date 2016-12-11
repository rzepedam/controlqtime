<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CompanyCreateTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $typeCompany;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		$this->typeCompany = factory(\Controlqtime\Core\Entities\TypeCompany::class)->create();
	}
	
	function test_create_company()
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
			->seeInElement('button', 'Guardar')
			->assertResponseOk();
	}
	
	function test_store_company()
	{
		$this->visit('administration/companies/create')
			->select($this->typeCompany->id, '#type_company_id')
			->type('6.639.112-4', 'rut')
			->type('Sociedad Parra Ltda.', 'firm_name')
			->type('Venta de insumos y repuestos para vehículos motorizados', 'gyre')
			->type('01-12-1979', 'start_act')
			->type('8924798374', 'muni_license')
			->type('Av. Vicuña Mackenna 12990', '#address')
			->type('1B', 'lot')
			->type('14', 'bod')
			->type('12', 'ofi')
			->type('1', 'floor')
			->select($this->region->id, '#region_id')
			->select($this->province->id, '#province_id')
			->select($this->commune->id, '#commune_id')
			->type('+56988102901', 'phone1')
			->type('225909110', 'phone2')
			->type('parra.ltda@gmail.com', 'email_company')
			->type('Parra', 'male_surname')
			->type('Ossa', 'female_surname')
			->type('Manuel', 'first_name')
			->type('José', 'second_name')
			->type('17.638.322-4', 'rut_representative')
			->type('11-04-1980', 'birthday')
			->select($this->nationality->id, '#nationality_id')
			->type('Los Leones 170', 'address_representative')
			->type('19', 'depto')
			->type('2', 'block')
			->type('12', 'num_home')
			->select($this->region->id, '#region_id')
			->select($this->province->id, '#province_id')
			->select($this->commune->id, '#commune_id')
			->type('+56999102810', 'phone1_representative')
			->type('', 'phone2_representative')
			->type('manuel.parra@gmail.com', 'email_representative')
			->press('Guardar')
			->seeInDatabase('companies', [
				'type_company_id' => $this->typeCompany->id,
				'rut'             => '6639112-4',
				'firm_name'       => 'Sociedad Parra ltda.',
				'gyre'            => 'Venta de insumos y repuestos para vehículos motorizados',
				'start_act'       => '1979-12-01',
				'muni_license'    => '8924798374',
				'email_company'   => 'parra.ltda@gmail.com'])
			->seeInDatabase('addresses', [
				'addressable_type' => 'Controlqtime\Core\Entities\Company',
				'address'          => 'Av. Vicuña Mackenna 12990',
				'commune_id'       => $this->commune->id,
				'phone1'           => '+56988102901',
				'phone2'           => '225909110'])
			->seeInDatabase('detail_address_companies', [
				'lot'   => '1B',
				'bod'   => '14',
				'ofi'   => '12',
				'floor' => '1'])
			->seeInDatabase('legal_representatives', [
				'male_surname'         => 'Parra',
				'female_surname'       => 'Ossa',
				'first_name'           => 'Manuel',
				'second_name'          => 'José',
				'rut_representative'   => '17638322-4',
				'birthday'             => '1980-04-11',
				'nationality_id'       => $this->nationality->id,
				'email_representative' => 'manuel.parra@gmail.com'])
			->seeInDatabase('detail_address_legal_employees', [
				'depto'    => '19',
				'block'    => '2',
				'num_home' => '12'
			]);
	}
}
