<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class RemunerationTest extends TestCase
{
	use DatabaseTransactions;
	
	protected $contract;
	
	protected $familyResponsability;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
		
		$this->contract = factory(\Controlqtime\Core\Entities\Contract::class)->create([
			'employee_id' => $this->employee->id
		]);
		
		$this->familyResponsability = factory(\Controlqtime\Core\Entities\FamilyResponsability::class)->create([
			'employee_id' => $this->employee->id
		]);
	}
	
	function test_index_remuneration()
	{
		$this->visit('human-resources/remunerations')
			->seeInElement('h1', 'Remuneraciones')
			->seeInElement('#employee_id', $this->employee->fullName)
			->seeInElement('td', 'Sueldo Base')
			->seeInElement('td', $this->employee->contract->salary)
			->seeInElement('td', 'Gratificación')
			->seeInElement('td', $this->employee->contract->gratification())
			->seeInElement('td', 'Horas Extras')
			->seeInElement('td', 'Comisión')
			->seeInElement('td', 'Bono Imponible')
			->seeInElement('td', 'Inasistencias')
			->seeInElement('td', 'Atrasos')
			->seeInElement('td', 'Total Asistencia y Atrasos')
			->seeInElement('td', 'Total Imponible')
			->seeInElement('td', $this->employee->contract->totalImponible())
			->seeInElement('td', 'Cargas Familiares')
			->seeInElement('td', $this->employee->contract->asignacionFamiliar())
			->seeInElement('td', 'Locomoción')
			->seeInElement('td', $this->employee->contract->mobilization)
			->seeInElement('td', 'Colación')
			->seeInElement('td', $this->employee->contract->collation)
			->seeInElement('td', 'Bono No Imponible')
			->seeInElement('td', 'Total Haber')
			->seeInElement('td', $this->employee->contract->totalHaber())
			->seeInElement('td', 'AFP')
			->seeInElement('td', $this->employee->contract->totalPension())
			->seeInElement('td', 'APV')
			->seeInElement('td', 'Seguro Cesantía')
			->seeInElement('td', 'Salud')
			->seeInElement('td', $this->employee->contract->totalForecast())
			->seeInElement('td', 'Cotización Adicional Isapre')
			->seeInElement('td', 'Valor Plan')
			->seeInElement('td', 'Descuentos Afectos')
			->seeInElement('td', $this->employee->contract->descuentosAfectos())
			->seeInElement('td', 'Base Tributable')
			->seeInElement('td', $this->employee->contract->baseTributable())
			->seeInElement('td', 'Impuesto')
			->seeInElement('td', $this->employee->contract->valorImpuestoSegundaCategoria())
			->seeInElement('td', 'Rebaja')
			->seeInElement('td', $this->employee->contract->rebajaImpuesto())
			->seeInElement('td', 'Impuesto Único')
			->seeInElement('td', $this->employee->contract->impuestoUnico())
			->seeInElement('td', 'Descuentos Varios')
			->seeInElement('td', 'Total Descuentos')
			->seeInElement('td', $this->employee->contract->totalDescuentos())
			->seeInElement('td', 'Anticipos')
			->seeInElement('td', 'Sueldo Líquido')
			->seeInElement('td', $this->employee->contract->sueldoLiquido());
		
		/*
		 * @todo unit tests to $this->employee->contract->salary, $this->employee->contract->gratification()
		 * @todo unit tests to $employee->familyAllowance()
		 */
	}
	
}
