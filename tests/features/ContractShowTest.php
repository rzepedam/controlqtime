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
		
		$this->contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'created_at' => '2016-12-13 08:50:45'
		]);
		
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
	
	function test_show_contract()
    {
        $this->visit('human-resources/contracts/' . $this->contract->id)
	        ->seeInElement('h1', 'Detalle Contrato: <span class="text-primary">' . $this->contract->id . '</span>')
	        ->seeInElement('a', 'Información Laboral')
	        ->seeInElement('a', 'Cláusulas y Obligaciones')
	        ->seeInElement('td', 'Información Laboral')
	        ->seeInElement('td', $this->contract->company->firm_name)
	        ->seeInElement('td', $this->contract->employee->full_name)
	        ->seeInElement('td', $this->contract->position->name)
	        ->seeInElement('td', $this->contract->area->name)
	        ->seeInElement('td', $this->contract->numHour->name)
	        ->seeInElement('td', $this->contract->periodicity->name)
	        ->seeInElement('td', $this->contract->dayTrip->name)
	        ->seeInElement('td', '09:00 - 13:00 hrs')
	        ->seeInElement('td', '14:00 - 19:00 hrs')
	        ->seeInElement('td', 'martes 13 diciembre 2016')
	        ->seeInElement('td', $this->contract->salary)
	        ->seeInElement('td', $this->contract->mobilization)
	        ->seeInElement('td', $this->contract->collation)
	        ->seeInElement('td', '25% legal anticipada con tope de 4.75 SMM')
	        ->seeInElement('td', $this->contract->typeContract->name)
	        ->see($this->obligationsAndProhibitionsA->name)
	        ->see($this->obligationsAndProhibitionsB->name)
	        ->see($this->obligationsAndProhibitionsC->name)
	        ->seeInElement('a', 'Volver');
    }
}
