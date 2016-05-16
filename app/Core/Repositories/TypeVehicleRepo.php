<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TypeVehicleRepoInterface;
use Controlqtime\Core\Entities\TypeVehicle;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class TypeVehicleRepo extends BaseRepo implements TypeVehicleRepoInterface
{
    use ListsTrait;
    
    protected $model;

    public function __construct(TypeVehicle $model)
    {
        $this->model = $model;
    }
}