<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_employee_exists()
    {
        $this->visit('human-resources/employees')
            ->assertResponseOk();
    }

    public function test_route_exists()
    {
        $this->visitRoute('employees.index')
            ->assertResponseOk();
    }

    public function test_index_employee()
    {
        $this->visit('human-resources/employees')
            ->seeInElement('h1', 'Listado de Trabajadores')
            ->seeInElement('a', 'Crear Nuevo Trabajador')
            ->seeInElement('th', 'Nombre')
            ->seeInElement('th', 'Email')
            ->seeInElement('th', 'Nacionalidad');
    }
}
