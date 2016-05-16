<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\FuelRepoInterface;
use Controlqtime\Core\Entities\Fuel;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\ListsTrait;

class FuelRepo extends BaseRepo implements FuelRepoInterface
{
    use ListsTrait;
    
    protected $model;

    public function __construct(Fuel $model)
    {
        $this->model = $model;
    }
}