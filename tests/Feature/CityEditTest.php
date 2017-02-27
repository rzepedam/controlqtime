<?php

use Controlqtime\Core\Entities\City;
use Controlqtime\Core\Entities\Country;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CityEditTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $city;

    protected $country;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->country = factory(Country::class)->create();
        $this->city = factory(City::class)->create();
    }

    public function test_edit_city()
    {
        $this->visit('maintainers/cities/'.$this->city->id.'/edit')
            ->see('Editar Ciudad: <span class="text-primary">'.$this->city->id.'</span>')
            ->seeInField('#name', $this->city->name)
            ->seeInElement('#country_id', $this->city->country_id)
            ->see('Actualizar');
    }

    public function test_update_city()
    {
        $id = $this->city->id + 1;
        $country = Country::create([
            'id'   => $id,
            'name' => 'Argentina',
        ]);

        $this->visit('maintainers/cities/'.$this->city->id.'/edit')
            ->type('test', 'name')
            ->select($country->id, 'country_id')
            ->press('Actualizar')
            ->seeInDatabase('cities', [
                'name'       => 'test',
                'country_id' => $country->id,
                'deleted_at' => null,
            ]);
    }
}
