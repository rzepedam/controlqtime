<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TypeVehicleRepoInterface;
use Controlqtime\Core\Entities\TypeVehicle;
use Controlqtime\Core\Repositories\Base\BaseRepoWithLists;

class TypeVehicleRepo extends BaseRepoWithLists implements TypeVehicleRepoInterface
{
    protected $model;

    public function __construct(TypeVehicle $model)
    {
        $this->model = $model;
    }
}