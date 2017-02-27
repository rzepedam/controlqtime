<?php

use Controlqtime\Core\Entities\Mutuality;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MutualityEditTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $mutuality;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->mutuality = factory(Mutuality::class)->create();
    }

    public function test_edit_mutuality()
    {
        $this->visit('maintainers/mutualities/'.$this->mutuality->id.'/edit')
            ->seeInElement('h1', 'Editar Mutualidad: <span class="text-primary">'.$this->mutuality->id.'</span>')
            ->seeInField('name', $this->mutuality->name)
            ->seeInElement('button', 'Actualizar');
    }

    public function test_update_mutuality()
    {
        $this->visit('maintainers/mutualities/'.$this->mutuality->id.'/edit')
            ->type('test', 'name')
            ->press('Actualizar')
            ->seeInDatabase('mutualities', [
                'id'         => $this->mutuality->id,
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
