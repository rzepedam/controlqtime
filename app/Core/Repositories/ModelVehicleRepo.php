<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\ModelVehicleRepoInterface;
use Controlqtime\Core\Entities\ModelVehicle;
use Controlqtime\Core\Repositories\Base\BaseRepoWithLists;

class ModelVehicleRepo extends BaseRepoWithLists implements ModelVehicleRepoInterface
{
    protected $model;

    public function __construct(ModelVehicle $model)
    {
        $this->model = $model;
    }
}