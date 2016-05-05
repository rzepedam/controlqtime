<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TypeVehicleRepoInterface;
use Controlqtime\Core\Entities\TypeVehicle;

class TypeVehicleRepo extends BaseRepoWithLists implements TypeVehicleRepoInterface
{
    protected $model;

    public function __construct(TypeVehicle $model)
    {
        $this->model = $model;
    }
}