<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\VehicleRepoInterface;
use Controlqtime\Core\Entities\Vehicle;
use Controlqtime\Core\Repositories\Base\BaseRepo;

class VehicleRepo extends BaseRepo implements VehicleRepoInterface
{
    protected $model;

    public function __construct(Vehicle $model)
    {
        $this->model = $model;
    }
}