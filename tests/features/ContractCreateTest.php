<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContractCreateTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $companyA;
	
	protected $companyB;
	
	protected $position;
	
	protected $area;
	
	protected $dayTrip;
	
	protected $typeContract;
	
	protected $obligationsAndProhibitionsA;
	
	protected $obligationsAndProhibitionsB;
	
	protected $obligationsAndProhibitionsC;
	
	protected $forecast;
	
	protected $pension;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		
		$typeCompany = factory(\Controlqtime\Core\Entities\TypeCompany::class)->create([
			'name' => 'Operador'
		]);
		
		$this->companyA = factory(\Controlqtime\Core\Entities\Company::class)->states('enable')->create([
			'type_company_id' => $typeCompany->id,
			'firm_name'       => 'AJC productos marinos',
			'rut'             => '6.639.112-4',
			'start_act'       => '01-12-1979'
		]);
		
		$this->companyB = factory(\Controlqtime\Core\Entities\Company::class)->states('enable')->create([
			'type_company_id' => $typeCompany->id,
			'firm_name'       => 'Guinea Hnos. Ltda.',
			'rut'             => '5939305-7',
			'start_act'       => '17-09-1998'
		]);
		
		$this->position = factory(\Controlqtime\Core\Entities\Position::class)->create([
			'name' => 'Administrador'
		]);
		
		$terminal = factory(\Controlqtime\Core\Entities\Terminal::class)->create([
			'name'       => 'Juanita',
			'address'    => 'Av. Juanita 1490',
			'commune_id' => 1
		]);
		
		$this->area = factory(\Controlqtime\Core\Entities\Area::class)->create([
			'name'        => 'Mantención',
			'terminal_id' => $terminal->id
		]);
		
		$this->dayTrip = factory(\Controlqtime\Core\Entities\DayTrip::class)->create([
			'name' => 'Lunes a viernes'
		]);
		
		$this->typeContract = factory(\Controlqtime\Core\Entities\TypeContract::class)->create([
			'name'      => 'Plazo Fijo',
			'dur'       => '12',
			'full_name' => 'Plazo Fijo 12 meses'
		]);
		
		$this->forecast = factory(\Controlqtime\Core\Entities\Forecast::class)->create();
		
		$this->pension = factory(\Controlqtime\Core\Entities\Pension::class)->create();
		
		$this->obligationsAndProhibitionsA = factory(\Controlqtime\Core\Entities\TermAndObligatory::class)->create([
			'default' => 'on'
		]);
		
		$this->obligationsAndProhibitionsB = factory(\Controlqtime\Core\Entities\TermAndObligatory::class)->create([
			'default' => false
		]);
		
		$this->obligationsAndProhibitionsC = factory(\Controlqtime\Core\Entities\TermAndObligatory::class)->create([
			'default' => 'on'
		]);
	}
	
	/** @test */
	function create_contract()
	{
		$this->visit('human-resources/contracts/create')
			->seeInElement('h1', 'Crear Nuevo Contrato Laboral')
			->seeInElement('#company_id', 'AJC productos marinos')
			->seeInElement('#company_id', 'Guinea Hnos. Ltda.')
			->seeInElement('#employee_id', 'Raúl Elías Meza Mora')
			->seeInElement('#position_id', 'Administrador')
			->seeInElement('#area_id', 'Mantención')
			->seeInElement('#type_contract_id', 'Plazo Fijo 12 meses')
			->seeInField('#num_hour', '')
			->seeInElement('#day_trip_id', 'Lunes a viernes')
			->seeInField('#init_morning', '09:00')
			->seeInField('#end_morning', '13:00')
			->seeInField('#init_afternoon', '14:00')
			->seeInField('#end_afternoon', '19:00')
			->seeInElement('#forecast_id', $this->forecast->name)
			->seeInElement('#pension_id', $this->pension->name)
			->seeIsChecked('#default0')
			->dontSeeIsChecked('#default1')
			->seeIsChecked('#default2')
			->seeInElement('a', 'Volver')
			->seeInElement('button', 'Guardar');
	}
	
	/** @test */
	function store_contract()
	{
		$this->visit('human-resources/contracts/create')
			->select($this->companyA->id, '#company_id')
			->select($this->employee->id, '#employee_id')
			->select($this->position->id, '#position_id')
			->select($this->area->id, '#area_id')
			->select($this->typeContract->id, '#type_contract_id')
			->select($this->dayTrip->id, '#day_trip_id')
			->select($this->forecast->id, '#forecast_id')
			->select($this->pension->id, '#pension_id')
			->submitForm('Guardar', [
				'salary'                    => '580000',
				'mobilization'              => '80000',
				'collation'                 => '125000',
				'num_hour'                  => '45',
				'term_and_obligatory_id[0]' => $this->obligationsAndProhibitionsA->id,
				'term_and_obligatory_id[2]' => $this->obligationsAndProhibitionsC->id])
			->seeInDatabase('contracts', [
				'company_id'       => $this->companyA->id,
				'employee_id'      => $this->employee->id,
				'position_id'      => $this->position->id,
				'area_id'          => $this->area->id,
				'type_contract_id' => $this->typeContract->id,
				'num_hour'         => '45',
				'day_trip_id'      => $this->dayTrip->id,
				'init_morning'     => '0900',
				'end_morning'      => '1300',
				'init_afternoon'   => '1400',
				'end_afternoon'    => '1900',
				'salary'           => '580000',
				'mobilization'     => '80000',
				'collation'        => '125000',
				'forecast_id'      => $this->forecast->id,
				'pension_id'       => $this->pension->id])
			->seeInDatabase('contract_term_and_obligatory', [
				'term_and_obligatory_id' => $this->obligationsAndProhibitionsA->id])
			->dontseeInDatabase('contract_term_and_obligatory', [
				'term_and_obligatory_id' => $this->obligationsAndProhibitionsB->id])
			->seeInDatabase('contract_term_and_obligatory', [
				'term_and_obligatory_id' => $this->obligationsAndProhibitionsC->id
			]);
	}
	
	/** @test */
	function num_hour_should_not_be_less_than_1()
	{
		$this->json('POST', 'human-resources/contracts', [
			'company_id'       => $this->companyA->id,
			'employee_id'      => $this->employee->id,
			'position_id'      => $this->position->id,
			'area_id'          => $this->area->id,
			'type_contract_id' => $this->typeContract->id,
			'num_hour'         => '0',
			'day_trip_id'      => $this->dayTrip->id,
			'init_morning'     => '09:00',
			'end_morning'      => '13:00',
			'init_afternoon'   => '14:00',
			'end_afternoon'    => '18:00',
			'salary'           => '1000000',
			'mobilization'     => '50000',
			'collation'        => '50000',
			'forecast_id'      => $this->forecast->id,
			'pension_id'       => $this->pension->id
		]);
		
		$this->assertResponseStatus(422);
		$this->assertArrayHasKey('num_hour', $this->decodeResponseJson());
	}
	
	/** @test */
	function num_hour_must_be_grater_than_45()
	{
		$this->json('POST', 'human-resources/contracts', [
			'company_id'       => $this->companyA->id,
			'employee_id'      => $this->employee->id,
			'position_id'      => $this->position->id,
			'area_id'          => $this->area->id,
			'type_contract_id' => $this->typeContract->id,
			'num_hour'         => '72',
			'day_trip_id'      => $this->dayTrip->id,
			'init_morning'     => '09:00',
			'end_morning'      => '13:00',
			'init_afternoon'   => '14:00',
			'end_afternoon'    => '18:00',
			'salary'           => '1000000',
			'mobilization'     => '50000',
			'collation'        => '50000',
			'forecast_id'      => $this->forecast->id,
			'pension_id'       => $this->pension->id
		]);
		
		$this->assertResponseStatus(422);
		$this->assertArrayHasKey('num_hour', $this->decodeResponseJson());
	}
}
