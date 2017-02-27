<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class EngineCubicDeleteTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $engineCubic;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->engineCubic = factory(\Controlqtime\Core\Entities\EngineCubic::class)->create();
    }

    /** @test */
    public function delete_engine_cubic()
    {
        $this->delete('maintainers/measuring-units/engine-cubics/'.$this->engineCubic->id)
            ->dontSeeInDatabase('engine_cubics', [
                'id'         => $this->engineCubic->id,
                'deleted_at' => null,
            ]);
    }
}
