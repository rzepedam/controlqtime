<?php

use Controlqtime\Core\Entities\Country;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CountryCreateTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $country;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->country = factory(Country::class)->create();
    }

    public function test_create_country()
    {
        $this->visit('maintainers/countries/create')
            ->see('Crear Nuevo País')
            ->see('Nombre')
            ->see('Guardar')
            ->assertResponseOk();
    }

    public function test_store_country()
    {
        $this->visit('maintainers/countries/create')
            ->type('test', 'name')
            ->press('Guardar')
            ->seeInDatabase('countries', [
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
