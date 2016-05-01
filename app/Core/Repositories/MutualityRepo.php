<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Mutuality;

class MutualityRepo extends BaseRepo
{
    protected $model;

    public function __construct(Mutuality $model)
    {
        $this->model = $model;
    }
}