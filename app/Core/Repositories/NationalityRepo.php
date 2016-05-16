<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\NationalityRepoInterface;
use Controlqtime\Core\Entities\Nationality;
use Controlqtime\Core\Traits\ListsTrait;

class NationalityRepo implements NationalityRepoInterface
{
    use ListsTrait;

    protected $model;

    public function __construct(Nationality $model)
    {
        $this->model = $model;
    }
}