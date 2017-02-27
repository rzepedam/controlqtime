<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeCertificationCreateTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    public function test_create_type_certification()
    {
        $this->visit('maintainers/type-certifications/create')
            ->seeInElement('h1', 'Crear Nueva Certificación')
            ->see('Nombre')
            ->seeInElement('button', 'Guardar');
    }

    public function test_store_type_certification()
    {
        $this->visit('maintainers/type-certifications/create')
            ->type('test', 'name')
            ->press('Guardar')
            ->seeInDatabase('type_certifications', [
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
