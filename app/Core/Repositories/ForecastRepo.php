<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Forecast;

class ForecastRepo extends BaseRepo
{
    protected $model;

    public function __construct(Forecast $model)
    {
        $this->model = $model;
    }
}