<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\ForecastRepoInterface;
use Controlqtime\Core\Entities\Forecast;

class ForecastRepo extends BaseRepo implements ForecastRepoInterface
{
    protected $model;

    public function __construct(Forecast $model)
    {
        $this->model = $model;
    }
}