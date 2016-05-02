<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\RouteRepoInterface;
use Controlqtime\Core\Entities\Route;

class RouteRepo extends BaseRepo implements RouteRepoInterface
{
    protected $model;

    public function __construct(Route $model)
    {
        $this->model = $model;
    }
}