<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\TypeVehicle;

class TypeVehicleRepo extends BaseRepo
{
    protected $model;

    public function __construct(TypeVehicle $model)
    {
        $this->model = $model;
    }
}