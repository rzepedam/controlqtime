<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\DegreeRepoInterface;
use Controlqtime\Core\Entities\Degree;

class DegreeRepo extends BaseRepo implements DegreeRepoInterface
{
    protected $model;

    public function __construct(Degree $model)
    {
        $this->model = $model;
    }
}