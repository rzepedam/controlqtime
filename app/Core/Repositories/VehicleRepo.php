<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\VehicleRepoInterface;
use Controlqtime\Core\Entities\Vehicle;

class VehicleRepo extends BaseRepo implements VehicleRepoInterface
{
    protected $model;

    public function __construct(Vehicle $model)
    {
        $this->model = $model;
    }
}