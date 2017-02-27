<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CityWithTrashedTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $city;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->city = factory(\Controlqtime\Core\Entities\City::class)->create();
    }

    public function test_edit_city_when_country_is_deleted()
    {
        $this->delete('maintainers/countries/'.$this->city->country->id);

        $this->visit('maintainers/cities/'.$this->city->id.'/edit')
            ->seeInField('name', $this->city->name)
            ->seeInElement('#country_id', 'Seleccione País...');
    }
}
