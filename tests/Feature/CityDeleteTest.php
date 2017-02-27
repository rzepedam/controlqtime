<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class CityDeleteTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $city;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->city = factory(\Controlqtime\Core\Entities\City::class)->create();
    }

    public function test_delete_city()
    {
        $this->delete('maintainers/cities/'.$this->city->id)
            ->dontSeeInDatabase('cities', [
                'id'         => $this->city->id,
                'deleted_at' => null,
            ]);
    }
}
