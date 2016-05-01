<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\TypeExam;

class TypeExamRepo extends BaseRepo
{
    protected $model;

    public function __construct(TypeExam $model)
    {
        $this->model = $model;
    }
}