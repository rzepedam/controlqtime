<?php

namespace Controlqtime\Core\Repositories;

use Controlqtime\Core\Contracts\CountryRepoInterface;
use Controlqtime\Core\Entities\Country;
use Controlqtime\Core\Repositories\Base\BaseRepo;
use Controlqtime\Core\Traits\Lists;

class CountryRepo extends BaseRepo implements CountryRepoInterface
{
    use Lists;

    protected $model;

    public function __construct(Country $model)
    {
        $this->model = $model;
    }
}