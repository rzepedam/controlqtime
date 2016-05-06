<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\ForecastRepoInterface;
use Controlqtime\Core\Entities\Forecast;
use Controlqtime\Core\Repositories\Base\BaseRepo;

class ForecastRepo extends BaseRepo implements ForecastRepoInterface
{
    protected $model;

    public function __construct(Forecast $model)
    {
        $this->model = $model;
    }
}