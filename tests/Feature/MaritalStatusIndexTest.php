<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class MaritalStatusIndexTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $maritalStatus;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_url_marital_status()
    {
        $this->visit('maintainers/marital-statuses')
            ->assertResponseOk();
    }

    public function test_route_marital_status()
    {
        $this->visitRoute('marital-statuses.index')
            ->assertResponseOk();
    }

    public function test_index_marital_status()
    {
        $this->visit('maintainers/marital-statuses')
            ->see('Listado de Estados Civiles')
            ->seeInElement('a', 'Crear Nuevo Estado Civil')
            ->see('Nombre');
    }
}
