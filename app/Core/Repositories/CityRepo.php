<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\CityRepoInterface;
use Controlqtime\Core\Entities\City;

class CityRepo extends BaseRepo implements CityRepoInterface
{
    protected $model;

    public function __construct(City $model)
    {
        $this->model = $model;
    }
}