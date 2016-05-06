<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TypeExamRepoInterface;
use Controlqtime\Core\Entities\TypeExam;
use Controlqtime\Core\Repositories\Base\BaseRepo;

class TypeExamRepo extends BaseRepo implements TypeExamRepoInterface
{
    protected $model;

    public function __construct(TypeExam $model)
    {
        $this->model = $model;
    }
}