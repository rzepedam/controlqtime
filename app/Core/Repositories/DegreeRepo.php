<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\DegreeRepoInterface;
use Controlqtime\Core\Entities\Degree;
use Controlqtime\Core\Repositories\Base\BaseRepo;

class DegreeRepo extends BaseRepo implements DegreeRepoInterface
{
    protected $model;

    public function __construct(Degree $model)
    {
        $this->model = $model;
    }
}