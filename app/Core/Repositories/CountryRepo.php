<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Entities\Country;

class CountryRepo extends BaseRepo
{
    protected $model;

    public function __construct(Country $model)
    {
        $this->model = $model;
    }
}