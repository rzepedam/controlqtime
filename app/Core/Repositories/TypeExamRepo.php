<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TypeExamRepoInterface;
use Controlqtime\Core\Entities\TypeExam;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class TypeExamRepo extends BaseRepo implements TypeExamRepoInterface
{
    use ListsTrait;
    
    protected $model;

    public function __construct(TypeExam $model)
    {
        $this->model = $model;
    }
}