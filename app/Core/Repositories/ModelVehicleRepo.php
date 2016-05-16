<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\ModelVehicleRepoInterface;
use Controlqtime\Core\Entities\ModelVehicle;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class ModelVehicleRepo extends BaseRepo implements ModelVehicleRepoInterface
{
    use ListsTrait;

    protected $model;

    public function __construct(ModelVehicle $model)
    {
        $this->model = $model;
    }
}