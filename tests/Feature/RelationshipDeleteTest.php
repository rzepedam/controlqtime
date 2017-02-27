<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class RelationshipDeleteTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $relationship;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->relationship = factory(\Controlqtime\Core\Entities\Relationship::class)->create();
    }

    public function test_delete_relationship()
    {
        $this->delete('maintainers/relationships/'.$this->relationship->id)
            ->dontSeeInDatabase('relationships', [
                'id'         => $this->relationship->id,
                'deleted_at' => null,
            ]);
    }
}
