<?php

use Controlqtime\Core\Entities\Relationship;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RelationshipEditTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $relationship;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->relationship = factory(Relationship::class)->create();
    }

    public function test_edit_relationship()
    {
        $this->visit('maintainers/relationships/'.$this->relationship->id.'/edit')
            ->seeInElement('h1', 'Editar Relación Familiar: <span class="text-primary">'.$this->relationship->id.'</span>')
            ->seeInField('#name', $this->relationship->name)
            ->seeInElement('button', 'Actualizar');
    }

    public function test_update_relationship()
    {
        $this->visit('maintainers/relationships/'.$this->relationship->id.'/edit')
            ->type('test', 'name')
            ->press('Actualizar')
            ->seeInDatabase('relationships', [
                'id'         => $this->relationship->id,
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
