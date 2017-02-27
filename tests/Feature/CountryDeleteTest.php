<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CountryDeleteTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $country;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->country = factory(\Controlqtime\Core\Entities\Country::class)->create();
    }

    public function test_delete_country()
    {
        $this->delete('maintainers/countries/'.$this->country->id)
            ->dontSeeInDatabase('countries', [
                'id'         => $this->country->id,
                'deleted_at' => null,
            ]);
    }
}
