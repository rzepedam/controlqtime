<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\FuelRepoInterface;
use Controlqtime\Core\Entities\Fuel;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\Lists;

class FuelRepo extends BaseRepo implements FuelRepoInterface
{
    use Lists;
    
    protected $model;

    public function __construct(Fuel $model)
    {
        $this->model = $model;
    }
}