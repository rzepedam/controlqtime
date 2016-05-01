<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\TypeDisease;

class TypeDiseaseRepo extends BaseRepo
{
    protected $model;

    public function __construct(TypeDisease $model)
    {
        $this->model = $model;
    }
}