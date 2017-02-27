<?php

use Controlqtime\Core\Entities\TypeExam;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeExamEditTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $typeExam;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->typeExam = factory(TypeExam::class)->create();
    }

    public function test_edit_type_exam()
    {
        $this->visit('maintainers/type-exams/'.$this->typeExam->id.'/edit')
            ->seeInElement('h1', 'Editar Examen: <span class="text-primary">'.$this->typeExam->id.'</span>')
            ->seeInField('#name', $this->typeExam->name)
            ->seeInElement('button', 'Actualizar');
    }

    public function test_update_type_exam()
    {
        $this->visit('maintainers/type-exams/'.$this->typeExam->id.'/edit')
            ->type('test', 'name')
            ->press('Actualizar')
            ->seeInDatabase('type_exams', [
                'id'         => $this->typeExam->id,
                'name'       => 'test',
                'deleted_at' => null,
            ]);
    }
}
