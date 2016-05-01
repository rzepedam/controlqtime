<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\TypeSpeciality;

class TypeSpecialityRepo extends BaseRepo
{
    protected $model;

    public function __construct(TypeSpeciality $model)
    {
        $this->model = $model;
    }
}