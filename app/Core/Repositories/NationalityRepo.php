<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\NationalityRepoInterface;
use Controlqtime\Core\Entities\Nationality;
use Controlqtime\Core\Traits\Lists;

class NationalityRepo implements NationalityRepoInterface
{
    use Lists;

    protected $model;

    public function __construct(Nationality $model)
    {
        $this->model = $model;
    }
}