<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class WeightDeleteTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $weight;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->weight = factory(\Controlqtime\Core\Entities\Weight::class)->create([
            'name' => 'Kilógramo',
            'acr'  => 'kg',
        ]);
    }

    public function test_delete_weight()
    {
        $this->delete('maintainers/measuring-units/weights/'.$this->weight->id)
            ->dontSeeInDatabase('weights', [
                'id'         => $this->weight->id,
                'deleted_at' => null,
            ]);
    }
}
