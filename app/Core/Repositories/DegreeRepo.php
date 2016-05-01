<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Degree;

class DegreeRepo extends BaseRepo
{
    protected $model;

    public function __construct(Degree $model)
    {
        $this->model = $model;
    }
}