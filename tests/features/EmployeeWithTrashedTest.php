<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeWithTrashedTest extends TestCase
{
	use DatabaseTransactions;
	
	function setUp()
	{
		parent::setUp();
		$this->signIn();
	}
	
	function test_edit_employee_when_marital_status_is_deleted()
	{
		$this->delete('maintainers/marital-statuses/' . $this->employee->maritalStatus->id);
		
		$this->visit('human-resources/employees/' . $this->employee->id . '/edit')
			->seeInElement('#marital_status_id', 'Seleccione Estado Civil...');
	}
	
	function test_edit_employee_when_forecast_is_deleted()
	{
		$this->delete('maintainers/forecasts/' . $this->employee->forecast->id);
		
		$this->visit('human-resources/employees/' . $this->employee->id . '/edit')
			->seeInElement('#forecast_id', 'Seleccione Previsión...');
	}
	
	function test_edit_employee_when_pension_is_deleted()
	{
		$this->delete('maintainers/pensions/' . $this->employee->pension->id);
		
		$this->visit('human-resources/employees/' . $this->employee->id . '/edit')
			->seeInElement('#pension_id', 'Seleccione Fondo de Pensión...');
	}
	
	function test_edit_marital_status_forecast_and_pension_is_deleted()
	{
		$this->delete('maintainers/marital-statuses/' . $this->employee->maritalStatus->id);
		$this->delete('maintainers/forecasts/' . $this->employee->forecast->id);
		$this->delete('maintainers/pensions/' . $this->employee->pension->id);
		
		$this->visit('human-resources/employees/' . $this->employee->id . '/edit')
			->seeInElement('#marital_status_id', 'Seleccione Estado Civil...')
			->seeInElement('#forecast_id', 'Seleccione Previsión...')
			->seeInElement('#pension_id', 'Seleccione Fondo de Pensión...');
	}
	
	/*function test_edit_contact_when_relationship_is_deleted()
	{
		$contact = factory(\Controlqtime\Core\Entities\ContactEmployee::class)->create();
		
		$this->delete('maintainers/relationships/' . $contact->relationship->id);
		
		$this->visit('human-resources/employees/' . $this->employee->id . '/edit')
			->seeInElement('#contact_relationship_id[]', 'Seleccione Relación...');
	}*/
}
