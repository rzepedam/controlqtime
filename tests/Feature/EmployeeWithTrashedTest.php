<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeWithTrashedTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_edit_employee_when_marital_status_is_deleted()
    {
        $this->delete('maintainers/marital-statuses/'.$this->employee->maritalStatus->id);

        $this->visit('human-resources/employees/'.$this->employee->id.'/edit')
            ->seeInElement('#marital_status_id', 'Seleccione Estado Civil...');
    }

    /*function test_edit_contact_when_relationship_is_deleted()
    {
        $contact = factory(\Controlqtime\Core\Entities\ContactEmployee::class)->create();

        $this->delete('maintainers/relationships/' . $contact->relationship->id);

        $this->visit('human-resources/employees/' . $this->employee->id . '/edit')
            ->seeInElement('#contact_relationship_id[]', 'Seleccione Relación...');
    }*/
}
