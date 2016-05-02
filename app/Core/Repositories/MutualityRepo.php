<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\MutualityRepoInterface;
use Controlqtime\Core\Entities\Mutuality;

class MutualityRepo extends BaseRepo implements MutualityRepoInterface
{
    protected $model;

    public function __construct(Mutuality $model)
    {
        $this->model = $model;
    }
}