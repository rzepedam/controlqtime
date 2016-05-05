<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\NationalityRepoInterface;
use Controlqtime\Core\Entities\Nationality;

class NationalityRepo extends BaseListsRepo implements NationalityRepoInterface
{
    protected $model;

    public function __construct(Nationality $model)
    {
        $this->model = $model;
    }
}