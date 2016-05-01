<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\TypeInstitution;

class TypeInstitutionRepo extends BaseRepo
{
    protected $model;

    public function __construct(TypeInstitution $model)
    {
        $this->model = $model;
    }
}