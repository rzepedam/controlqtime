<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypeExamDeleteTest extends BrowserKitTestCase
{
    use DatabaseTransactions;

    protected $typeExam;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
        $this->typeExam = factory(\Controlqtime\Core\Entities\TypeExam::class)->create();
    }

    public function test_delete_type_exam()
    {
        $this->delete('maintainers/type-exams/'.$this->typeExam->id)
            ->dontSeeInDatabase('type_exams', [
                'id'         => $this->typeExam->id,
                'deleted_at' => null,
            ]);
    }
}
