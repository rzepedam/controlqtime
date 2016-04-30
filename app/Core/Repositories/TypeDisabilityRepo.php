<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\TypeDisability;

class TypeDisabilityRepo extends BaseRepo
{
    protected $model;

    public function __construct(TypeDisability $model)
    {
        $this->model = $model;
    }
}