<?php

use Controlqtime\Core\Entities\Country;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CountryEditTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $country;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->country = factory(Country::class)->create();
    }

    public function test_edit_country()
    {
        $this->visit('maintainers/countries/'.$this->country->id.'/edit')
            ->see('Editar País: <span class="text-primary">'.$this->country->id.'</span>')
            ->seeInField('#name', $this->country->name)
            ->see('Actualizar')
            ->assertResponseOk();
    }

    public function test_update_country()
    {
        $this->visit('maintainers/countries/'.$this->country->id.'/edit')
            ->type('test', 'name')
            ->press('Actualizar')
            ->seeInDatabase('countries', [
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
