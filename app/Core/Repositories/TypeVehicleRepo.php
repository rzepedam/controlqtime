<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\TypeVehicleRepoInterface;
use Controlqtime\Core\Entities\TypeVehicle;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\Lists;

class TypeVehicleRepo extends BaseRepo implements TypeVehicleRepoInterface
{
    use Lists;
    
    protected $model;

    public function __construct(TypeVehicle $model)
    {
        $this->model = $model;
    }
}