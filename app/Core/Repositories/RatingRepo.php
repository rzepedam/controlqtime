<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Rating;

class RatingRepo extends BaseRepo
{
    protected $model;

    public function __construct(Rating $model)
    {
        $this->model = $model;
    }
}