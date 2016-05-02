<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TypeDiseaseRepoInterface;
use Controlqtime\Core\Entities\TypeDisease;

class TypeDiseaseRepo extends BaseRepo implements TypeDiseaseRepoInterface
{
    protected $model;

    public function __construct(TypeDisease $model)
    {
        $this->model = $model;
    }
}