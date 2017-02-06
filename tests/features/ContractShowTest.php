<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContractShowTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $contract;
	
	protected $obligationsAndProhibitionsA;
	
	protected $obligationsAndProhibitionsB;
	
	protected $obligationsAndProhibitionsC;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		
		$this->contract = factory(\Controlqtime\Core\Entities\Contract::class)->create();
		
		$this->obligationsAndProhibitionsA = factory(\Controlqtime\Core\Entities\TermAndObligatory::class)->create([
			'default' => 'on'
		]);
		
		$this->obligationsAndProhibitionsB = factory(\Controlqtime\Core\Entities\TermAndObligatory::class)->create([
			'default' => 'on'
		]);
		
		$this->obligationsAndProhibitionsC = factory(\Controlqtime\Core\Entities\TermAndObligatory::class)->create([
			'default' => 'on'
		]);
		
		$this->contract->termsAndObligatories()->attach($this->obligationsAndProhibitionsA->id);
		$this->contract->termsAndObligatories()->attach($this->obligationsAndProhibitionsB->id);
		$this->contract->termsAndObligatories()->attach($this->obligationsAndProhibitionsC->id);
	}
	
	/** @test */
	function show_contract()
    {
        $this->visit('human-resources/contracts/' . $this->contract->id)
	        ->seeInElement('h1', 'Detalle Contrato: <span class="text-primary">' . $this->contract->id . '</span>')
	        ->seeInElement('a', 'Información Laboral')
	        ->seeInElement('a', 'Cláusulas y Obligaciones')
	        ->seeInElement('td', 'Información Laboral')
	        ->seeInElement('td', $this->contract->company->firm_name)
	        ->seeInElement('td', $this->contract->employee->full_name)
	        ->seeInElement('td', 'martes 13 diciembre 2016')
	        ->seeInElement('td', $this->contract->position->name)
	        ->seeInElement('td', $this->contract->area->name)
	        ->seeInElement('td', $this->contract->num_hour . ' hrs semanales')
	        ->seeInElement('td', $this->contract->dayTrip->name)
	        ->seeInElement('td', '09:00 - 13:00 hrs')
	        ->seeInElement('td', '14:00 - 19:00 hrs')
	        ->seeInElement('td', $this->contract->sueldo_base)
	        ->seeInElement('td', $this->contract->mobilization_money_field)
	        ->seeInElement('td', $this->contract->collation_money_field)
	        ->seeInElement('td', '25% legal anticipada con tope de 4.75 SMM')
	        ->seeInElement('td', $this->contract->typeContract->name)
	        ->seeInElement('td', $this->contract->forecast->name)
	        ->seeInElement('td', $this->contract->pension->name)
	        ->see($this->obligationsAndProhibitionsA->name)
	        ->see($this->obligationsAndProhibitionsB->name)
	        ->see($this->obligationsAndProhibitionsC->name)
	        ->seeInElement('a', 'Volver');
    }
}
